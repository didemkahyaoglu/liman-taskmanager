<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class TaskManagerController
{
	function getList()
    {
        // Komut çalıştırdık
        $cmd = Command::runSudo("ps -Ao user,pid,pcpu,stat,unit,pmem,comm --sort=-pcpu");

        // Komutu newline ile böldük
        $cmd = explode("\n", $cmd);

        // İlk satırı attık
        array_splice($cmd, 0, 1);

        // her satır üzerinde işlem yapalım.
        foreach ($cmd as $key => &$process)
        {
            // fazlalık boşluklarımı sildim
            $process = preg_replace('/\s+/', ' ', $process);

            // boşluklara göre parçalayalım
            $process = explode(" ", $process);

            // veriyi formatlayalim
            $process = [
                "user" => $process[0],
                "pid" => $process[1],
                "cpu" => $process[2],
                "status" => $process[3],
                "service" => $process[4],
                "ram" => $process[5],
                "command" => $process[6]
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["user", "pid", "cpu", "status", "service", "ram", "command"],
            "title" => ["Kullanıcı", "PID", "% İşlemci", "Durum", "Servis", "% Bellek", "İşlem"],
            "menu" => [
                "Dosya Konumu" => [
                    "target" => "jsGetFileLocation",
                    "icon" => "fa-location-arrow"
                ],
                "Çalıştırma Argümanları" => [
                    "target" => "jsGetPsCommand",
                    "icon" => "fa-walking"  
                ],
                "İşlem Ağacı" => [
                    "target" => "jsPsTree",
                    "icon" => "fa-project-diagram"
                ],
                "Servis Detayları" => [
                    "target" => "jsGetService",
                    "icon" => "fa-tasks"
                ],
                "İşlemi Sonlandır" => [
                    "target" => "jsKillPid",
                    "icon" => "fa-times"
                ],
                "Tüm İşlemleri Sonlandır" => [
                    "target" => "jsKillAll",
                    "icon" => "fa-skull-crossbones"
                ],
            ]
        ]);
    }

    function getFileLocation()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $location = Command::runSudo("readlink -f /proc/@{:pid}/exe", [
            "pid" => request("pid")
        ]);

        return respond($location);
    }

    function getService()
    {
        $service = Command::runSudo("systemctl status @{:systemctlstatus}", [
            "systemctlstatus" => request("systemctlstatus")
        ]);
        return respond($service);
    }

    function killPid()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $command = Command::runSudo("kill @{:pid}", [
            "pid" => request("pid")
        ]);
        return respond($command);

    }

    function psTree()
    {
        
        $command = Command::runSudo("pstree");
        return respond($command);

    }

    function getPsCommand()
    {
        $command = Command::runSudo("ps -o cmd @{:pid}", [
            "pid" => request("pid")
        ]);
        return respond($command);
    }

    function killAll()
    {
        
        $command = Command::runSudo("pkill -U user");
        return respond($command);

    }



}
