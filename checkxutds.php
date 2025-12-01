<?php
error_reporting(0);
session_start();

$xnhac = "\033[1;96m";
$luc = "\033[1;92m";
$hong = "\033[1;95m";
$do = "\033[1;31m";
$vang = "\033[1;93m";
$trang = "\033[1;97m";

$logo = $trang . "\033[0;97m
╔═════════════════════════════════════════════════════════╗
║    \033[1;33m██████\033[1;31m╗         \033[1;33m████████\033[1;31m╗ \033[1;33m██████\033[1;31m╗  \033[1;33m██████\033[1;31m╗ \033[1;33m██\033[1;31m╗       \033[1;0m║
\033[1;0m║   \033[1;33m██\033[1;31m╔════╝         ╚══\033[1;33m██\033[1;31m╔══╝\033[1;33m██\033[1;31m╔═══\033[1;33m██\033[1;31m╗\033[1;33m██\033[1;31m╔═══\033[1;33m██\033[1;31m╗\033[1;33m██\033[1;31m║       \033[1;0m║
\033[1;0m║  \033[1;33m ██\033[1;31m║       \033[1;33m█████\033[1;31m╗    \033[1;33m██\033[1;31m║   \033[1;33m██\033[1;31m║   \033[1;33m██\033[1;31m║\033[1;33m██\033[1;31m║   \033[1;33m██\033[1;31m║\033[1;33m██\033[1;31m║       \033[1;0m║
\033[1;0m║  \033[1;33m ██\033[1;31m║       ╚════╝    \033[1;33m██\033[1;31m║   \033[1;33m██\033[1;31m║   \033[1;33m██\033[1;31m║\033[1;33m██\033[1;31m║   \033[1;33m██\033[1;31m║\033[1;33m██\033[1;31m║       \033[1;0m║
\033[1;0m║   \033[1;31m╚\033[1;33m██████\033[1;31m╗           \033[1;33m ██\033[1;31m║   ╚\033[1;33m██████\033[1;31m╔╝╚\033[1;33m██████\033[1;31m╔╝\033[1;33m███████\033[1;31m╗  \033[1;0m║\033[1;31m
\033[1;0m║   \033[1;31m ╚═════╝            ╚═╝    ╚═════╝  ╚═════╝  ╚═════╝  \033[1;0m║
║                                                         \033[1;0m║
║═════════════════════════════════════════════════════════║
║    " . $trang . "Youtube: " . $hong . "Cường Code Tools                            " . $trang . "║
║    " . $xnhac . "Nhóm Facebook: " . $luc . "Update sau nhé                        " . $trang . "║
║    " . $luc . "Web mua key: " . $xnhac . "Update sau                              " . $trang . "║
║    " . $hong . "Web tổng hợp: " . $trang . "Update Sau                             " . $trang . "║
║═════════════════════════════════════════════════════════║
║   " . $vang . "Mọi hướng dẫn bạn cần đều nằm ở trên kênh youtube     " . $trang . "║
║  " . $vang . "Cường Code Tools, vui lòng xem kỹ hướng dẫn và sử dụng." . $trang . "║
╚═════════════════════════════════════════════════════════╝
\033[1;31m[\033[1;32m✓\033[1;31m]\033[0m => \033[1;32mTools check xu tds
\033[1;31m[\033[1;32m✓\033[1;31m]\033[0m => \033[1;32mTools được code bởi Cường Code Tools
\033[1;0m-----------------------------------------------------------
";
$_SESSION['LOGO'] = $logo;

function tien($number)
{
    return number_format($number, 0, ',', '.');
}

function check_Access_token_TDS($token)
{
    $kq = @file_get_contents('https://traodoisub.com/api/?fields=profile&access_token=' . $token);
    return json_decode($kq, true);
}

function checkxu($logo)
{
    global $do, $luc, $vang, $trang;

    $tool = $do . "[" . $luc . "✔\033[1;31m] \033[1;37m=> " . $luc;
    $daucau2 = $tool;
    $thanhngang = "\033[1;0m-----------------------------------------------------------\n";

    $khoToken = [];

    while (true) {
        system('clear'); 
        echo $logo . "\n";

        if (file_exists("Access_token_TDS.txt")) {
            echo $daucau2 . "Bạn Đã Từng Nhập Access_token\n";
            echo "\033[1;31m[\033[1;32m✓\033[1;31m]\033[0m => \033[1;32mNhập \033[1;31m[\033[1;33m1\033[1;31m] \033[1;32mchạy \033[1;0mAccess_token \033[1;32mđã nhập\n";
            echo "\033[1;31m[\033[1;32m✓\033[1;31m]\033[0m => \033[1;32mNhập \033[1;31m[\033[1;33m2\033[1;31m] \033[1;32mthêm \033[1;0mAccess_token\n";
            echo "\033[1;31m[\033[1;32m✓\033[1;31m]\033[0m => \033[1;32mNhập \033[1;31m[\033[1;33m3\033[1;31m] \033[1;32mxoá \033[1;0mAccess_token \033[1;32mcũ và nhập lại\n";
            echo  $luc . "Nhập lựa chọn: $vang ";
            $nhapso = trim(fgets(STDIN));
            if ($nhapso == '3') {
                unlink("Access_token_TDS.txt");
                $khoToken = [];
            } else if ($nhapso == '2') {
                $khoToken = json_decode(file_get_contents("Access_token_TDS.txt"), true);
                unlink("Access_token_TDS.txt");
            } else {
                break;
            }
        }

        if (!file_exists("Access_token_TDS.txt")) {
            system('clear');
            echo $logo . "\n";
            echo $daucau2 . "Tool Check Xu TDS\n";
            echo $daucau2 . "Nhập Access_token (Enter để dừng)\n";
            $dem_tds = 0;
            while (true) {
                $dem_tds++;
                echo $daucau2 . "Nhập Access_token thứ $dem_tds: $vang";
                $nhap_tk = trim(fgets(STDIN));
                if (strlen($nhap_tk) < 10) {
                    break;
                }
                array_push($khoToken, $nhap_tk);
            }
            file_put_contents("Access_token_TDS.txt", json_encode($khoToken));
        }
    }

    $khoToken = json_decode(file_get_contents("Access_token_TDS.txt"), true);
    $dem_tk = count($khoToken);

    system('clear');
    echo $logo . "\n";
    echo $daucau2 . "Tool Check Xu TDS Cường Code Tools\n";
    echo $daucau2 . "Bạn Đã Nhập " . $trang . $dem_tk . $luc . " Access_token\n";
    echo $thanhngang;

    while (true) {
        $dem = 0;
        foreach ($khoToken as $token) {
            $dem++;
            $kq2 = check_Access_token_TDS($token);

            if (!isset($kq2['data'])) {
                echo $do . "Token [$dem] lỗi hoặc hết hạn!\n";
                echo "\033[1;0m-----------------------------------------------------------\n";
                continue;
            }

            $user = $kq2['data']['user'];
            $xu = $kq2['data']['xu'];
            $xudie = $kq2['data']['xudie'];

            echo $luc . "Token " . $do . "[$vang$dem$do]" . $luc . ": " . $trang . substr($token, 0, 25) . "...\n";
            echo $luc . "User: " . $trang . $user . $vang . " - " . $luc . "Xu: " . $trang . tien($xu) . $vang . " - " . $luc . "Xudie: " . $trang . tien($xudie) . "\n";
            echo "\033[1;0m-----------------------------------------------------------\n";
        }

        echo $thanhngang;
        echo $daucau2 . "Đã Check Tất Cả \033[1;0mAccess_token\n";
        echo "\033[1;31m[\033[1;32m✓\033[1;31m]\033[0m => \033[1;32mNhập \033[1;31m[\033[1;33m1\033[1;31m] \033[1;32mcheck lại\n";
            echo "\033[1;31m[\033[1;32m✓\033[1;31m]\033[0m => \033[1;32mNhập \033[1;31m[\033[1;33m2\033[1;31m] \033[1;32mdừng tool\n";
        echo  "\033[1;31m[\033[1;32m✓\033[1;31m]\033[0m => \033[1;32mNhập lựa chọn: $vang ";
        $nhapdi = trim(fgets(STDIN));
        if ($nhapdi == '2') {
            die($do . "Đã dừng tool!\n");
        }
    }
}

checkxu($logo);
