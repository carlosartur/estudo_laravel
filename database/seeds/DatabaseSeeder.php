<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('ContasPagarTableSeeder');        
    }
}

class ContasPagarTableSeeder extends seeder
{
    public function run()
    {
        $contas = [['Telefone', '35.50'], ['Agua', '40.45'], ['Luz', '135.50']];
        foreach($contas as $conta) {
            DB::insert("INSERT INTO contas_pagar(descricao, valor) VALUES (?, ?)",
            $conta);
        }
    }
}