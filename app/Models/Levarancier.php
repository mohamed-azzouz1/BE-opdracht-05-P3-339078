<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class Levarancier extends Model
{
    private $db;

    public function __construct()
    {
        $this->db = DB::connection()->getPdo();
    }
    
    public function getLeverancierOverzicht()
    {
        try {
            $stmt = $this->db->prepare('CALL spReadLeverancierOverzicht()');
            $stmt->execute();
            $result = $stmt->fetchAll();
            $stmt->closeCursor();
            return $result;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return [];
        }
    }
}
