<?php

namespace App\Models;

use App\Models\Criteria;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Guarded(['id'])]
class CollegeStudent extends Model
{
    use HasFactory;

    /** ==========================================================
     * HELPER LOGIKA SAW (Simple Additive Weighting)
     * ========================================================== */

    /**
     * Mencari nilai terendah (Min) dari tabel mahasiswa khusus untuk kriteria jenis COST.
     */
    private static function getMinValues()
    {
        $costCriterias = Criteria::getCostCriterias();
        
        $minValues = [];
        foreach ($costCriterias as $criteria) {
            $columnName = strtolower($criteria);
            $minValues[$columnName] = self::min($columnName);
        }
        
        return $minValues;
    }

    /**
     * Mencari nilai tertinggi (Max) dari tabel mahasiswa khusus untuk kriteria jenis BENEFIT.
     */
    private static function getMaxValues()
    {
        $benefitCriterias = Criteria::getBenefitCriterias();
        
        $maxValues = [];
        foreach ($benefitCriterias as $criteria) {
            $columnName = strtolower($criteria);
            $maxValues[$columnName] = self::max($columnName);
        }
        
        return $maxValues;
    }

    /**
     * Menghitung normalisasi matriks (skala 0 - 1) untuk 1 mahasiswa,
     * sekaligus mengalikannya dengan bobot masing-masing kriteria.
     */
    public function normalization() 
    {
        $minCosts         = self::getMinValues();
        $maxBenefits      = self::getMaxValues();
        $costCriterias    = Criteria::getCostCriterias();
        $benefitCriterias = Criteria::getBenefitCriterias();
        $weights          = Criteria::getWeightValues();
        
        $results = [];
        $results['total'] = 0;

        // Normalisasi COST
        foreach ($costCriterias as $criteria) {
            $columnName = strtolower($criteria);
            $normalValue = $minCosts[$columnName] / $this->$columnName;
            
            $results[$columnName] = $normalValue;
            $results['total'] += ($normalValue * $weights[$columnName]);
        }

        // Normalisasi BENEFIT
        foreach ($benefitCriterias as $criteria) {
            $columnName = strtolower($criteria);
            $normalValue = $this->$columnName / $maxBenefits[$columnName];
            
            $results[$columnName] = $normalValue;
            $results['total'] += ($normalValue * $weights[$columnName]);
        }

        return $results;
    }

    /** ==========================================================
     * HALAMAN UTAMA (ENGINES)
     * ========================================================== */

    /**
     * Memproses seluruh data mahasiswa, menghitung skor SAW,
     * lalu mengurutkan dari peringkat 1 (skor tertinggi).
     */
    public static function results()
    {
        $students = self::all();

        foreach ($students as $student) {
            $student->saw_scores = $student->normalization();
            $student->total_score = $student->saw_scores['total'];
        }

        return $students->sortByDesc('total_score')->values();
    }
}