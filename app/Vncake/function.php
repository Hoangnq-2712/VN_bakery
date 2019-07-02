<?php
/**
 * Created.by quoch
 * User: quoch
 * Date: 3/4/2019
 * Time: 10:28 PM
 */
function showCategories($data, $parent = 0, $str = "--|", $select = 0)
{
    foreach ($data as $item) {
        $id = $item->id;
        $name = $item->name;
        if ($item->parent == $parent) {
            if ($select != 0 && $id == $select) {
                echo '<option value="' . $id . '" selected>' . $str . " " . $name . '</option>';
            } else {
                echo '<option value="' . $id . '">' . $str . " " . $name . '</option>';
            }
            showCategories($data, $id, $str . "---|", $select);
        }
    }
}

function setActive($con)
{
    $cha = Route::currentRouteName();
    if (strlen(strstr($cha, $con)) > 0) {
        echo "navigation__sub--active navigation__sub--toggled";
    }
}

function setActiveCon($con)
{
    $cha = Route::currentRouteName();
    if ($cha == $con) {
        echo "navigation__active";
    }
}