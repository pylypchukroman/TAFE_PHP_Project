<?php

function isValidPassword($password) {
    return preg_match('/^(?=.*\d)\S{10,}$/', $password);
}