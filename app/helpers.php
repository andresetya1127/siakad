<?php


function css_($pakage)
{
    // Menentukan Direktory
    $dir = asset('assets/css/');

    if (!empty($pakage)) {
        // register asset
        $asset = [
            // =========================== Without CDN =======================

            'bootstrap' => '<link href="' . $dir . '/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />',
            'app' => '<link href="' . $dir . '/app.min.css"  rel="stylesheet" type="text/css" />',

            // =========================== With CDN =======================

            'icons' => '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.3.67/css/materialdesignicons.min.css" />',
            'select2' => '<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />',
            'font-awesome' => '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>',
            'animate' => '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />',
            'select-bootstrap' => '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">'
        ];

        // print asset
        foreach ($pakage as $pkg) {
            if (empty($asset[$pkg])) {
                abort('404');
            }
            echo $asset[$pkg];
        }
    } else {
        return abort('404');
    }
}

function js_($pakage)
{
    // Menentukan Direktory
    $dir = asset('assets');

    if (!empty($pakage)) {
        // register asset
        $asset = [

            // =========================== Without CDN =======================

            'jquery' => '<script src="' . $dir . '/libs/jquery/jquery.min.js"></script>',
            'bootstrap-bundle' => '<script src="' . $dir . '/libs/bootstrap/js/bootstrap.bundle.min.js"></script>',
            'metis-menu' => '<script src="' . $dir . '/libs/metismenu/metisMenu.min.js"></script>',
            'simplebar' => '<script src="' . $dir . '/libs/simplebar/simplebar.min.js"></script>',
            'waves' => '<script src="' . $dir . '/libs/node-waves/waves.min.js"></script>',
            'app' => '<script src="' . $dir . '/js/app.js"></script>',
            'app-custom' => '<script src="' . $dir . '/js/app-custom.js"></script>',
            'counter' => '<script src="' . $dir . '/js/counter.js"></script>',

            // =========================== With CDN =======================
            'sweatalert' => '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>',
            'select2' => '<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>',
            'validate' => ' <script src="' . $dir . '/js/pages/form-validation.init.js"></script>',
            'parseley' => '<script src="' . $dir . '/libs/parsleyjs/parsley.min.js"></script',
            'captcha' => '<script src="https://www.google.com/recaptcha/api.js" async defer></script>',
        ];


        // print asset
        foreach ($pakage as $pkg) {
            if (empty($asset[$pkg])) {
                abort('404');
            }
            echo $asset[$pkg];
        }
    } else {
        return abort('404');
    }
}

/**
 * Fungsi Looping
 *
 * @param var $data data yang ingin di looping
 * @param var $option tombol "add,edit,delete,show"
 * contoh = ['add.URL','edit.URL']
 * @param var $fields field yang tampil
 * custom  $field.link=URL.fiel yang dicari
 */

function linkButton($link = false,  $color = false, $text = false, $icon = false,)
{
    if (!$link) return "";
    $class = $color ? "class='me-2 btn $color'" : '';
    $ic = $icon ? "<i class='fa-solid $icon'></i> " : '';
    $t = $text ?? '';
    return "<a href='$link' $class >$ic $t</a>";
}

function getLoop($data = [], $fields = [])
{
    $table = null;
    $no = 1;
    if ($data  || $fields) {
        foreach ($data as $key) {
            $table .= '<tr>';
            foreach ($fields as $field => $record) {
                $table .= '<td>';
                if ($field == 'option') {
                    foreach ($record as $option => $opt) {
                        $str = strstr($opt, '|') ? explode('|', $opt, 2) : $opt;
                        $url = is_array($str) ? url($str[0], $key[$str[1]]) : $str;
                        if ($option == 'edit') {
                            $table .= linkButton($url, "btn-subtle-primary", "", "fa-pen-to-square");
                        } elseif ($option == 'delete') {
                            $table .= linkButton($url, "btn-subtle-danger", "", "fa-trash");
                        } elseif ($option == 'show') {
                            $table .= linkButton($url, "btn-subtle-info", "", "fa-eye");
                        }
                    }
                } elseif (!$record) {
                    $table .= '<i class="fa-solid fa-eye-slash"></i>';
                } elseif ($field == 'number++') {
                    $table .= $no++;
                } elseif (strstr($field, '+')) {
                    $sum = explode('+', $field, 2);
                    $table .= $key[$sum[0]] + $key[$sum[1]];
                } elseif (strstr($field, '|link')) {
                    $str = explode('|', $field, 2);
                    $link = explode('|', $record, 2);
                    $table .= linkButton(route($link[0], $key[$link[1]]), false, $key[$str[0]], false);
                } elseif (strstr($field, '|rel')) {
                    $str = explode('|', $field, 2);
                    $table .= !empty($key[$record][$str[0]]) ? $key[$record]->nm_agama : '';
                } elseif (strstr($field, 'jk') || strstr($field, 'jenis_kelamin')) {
                    $table .= $key[$field] == 'L' ? 'Laki-Laki' : 'Prempuan';
                } elseif (strstr($field, 'kode_jurusan') || strstr($field, 'kd_jurusan') || strstr($field, 'kd_prodi') || strstr($field, 'kode_prodi')) {
                    $table .= $key[$field] == '55201' ? 'Teknik Informatika' : 'Sistem Informasi';
                } else {
                    $table .= $key[$field];
                }
                $table .= '</td>';
            }
            $table .= '</tr>';
        }

        echo $table;
    }
}

/**
 * input type text
 *
 * @param var $data data dari server
 * @param var $title judul input
 * @param var $field nama field
 * @param var $class custom class
 */
function getInputText($title, $type, $field, $value = null)

{
    $input = null;
    if ($type == 'hidden') {
        $input .= "<input type='hidden' class='form-check-input' name='$field' value='$value'";
    } else {
        $input .= '<div class="col-lg-4 col-md-6 col-sm-12">';
        $input .= ' <div class="mb-3">';
        $input .= "<label for='$field' class='form-label pt-0'>$title</label>";
        $input .= "<input class='form-control' type='$type' value='$value' name='$field'  placeholder='Silahkan masukkan  $title'>";
        $input .= "</div>";
        $input .= "</div>";
    }

    echo $input;
}
function getRadio($title, $name, $data = [],)
{
    $input = null;
    $input .= '<div class="col-lg-4 col-md-6 col-sm-12">';
    $input .= ' <div class="mb-3">';
    $input .= "<label class='form-label pt-0'>$title</label>";
    foreach ($data as $key => $value) {
        $input .= "<div class='form-check my-2'>";
        $input .= "<input type='radio' id='$key' name='[$name]' value='$key' class='form-check-input'>";
        $input .= "<label class='form-check-label' for='$key'>$value</label>";
        $input .= "</div>";
    }

    $input .= "</div>";
    $input .= "</div>";

    echo $input;
}
function getCheckbox($title, $name, $data = [],)
{
    $input = null;
    $input .= '<div class="col-lg-4 col-md-6 col-sm-12">';
    $input .= ' <div class="mb-3">';
    $input .= "<label class='form-label pt-0'>$title</label>";
    foreach ($data as $key => $value) {
        $input .= "<div class='form-check my-2'>";
        $input .= "<input type='checkbox' id='$key' name='[$name]' value='$key' class='form-check-input' data-parsley-multiple='groups' data-parsley-mincheck='2'>";
        $input .= "<label class='form-check-label' for='$key'>$value</label>";
        $input .= "</div>";
    }

    $input .= "</div>";
    $input .= "</div>";
    echo $input;
}
function getSelect($data, $field, $title, $name, $selected)
{
    $input = null;
    $input .= "<div class='col-lg-4 col-md-6 col-sm-12'>";
    $input .= ' <div class="mb-3">';
    $input .= "<label class='form-label pt-0'>$title</label>";
    $input .= "<select class='form-select' name='$name'>";
    $input .= "<option selected hidden>$selected</option>";
    foreach ($data as $key => $value) {
        if ($field) {
            $str = explode('|', $field, 2);
            $input .= '<option value="' . $value[$str[0]] . '">' . $value[$str[1]]  . '</option>';
        } else {
            $input .= "<option value='$key'>$value</option>";
        }
    }
    $input .= " </select>";
    $input .= "</div>";
    $input .= "</div>";
    echo $input;
}

function getThead($header = [])
{
    $thead = null;
    $thead .= ' <tr>';
    foreach ($header as $head) {
        $thead .= "<th>$head</th>";
    }
    $thead .= ' </tr>';
    echo $thead;
}
