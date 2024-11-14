<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class menuPrincipalmodel extends Model
{
    use HasFactory;
    public function obtenerDefensasProgramadasHoy()
    {
        $result = DB::select('CALL obtenerTotalDefensasProgramadasHoy()');
        return $result;
    }
    public function obtenerTotalDefensasNoProgramadas()
    {
        $result = DB::select('CALL obtenerTotalDefensasNoProgramadas()');
        return $result;
    }
    public function obtenerTotalDefensasProgramadasMesActual()
    {
        $result = DB::select('CALL obtenerTotalDefensasProgramadasMesActual()');
        return $result;
    }
    public function obtenerTotalDefensasCompletadas()
    {
        $result = DB::select('CALL obtenerTotalDefensasCompletadas()');
        return $result;
    }
}
