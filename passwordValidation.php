<?php
function isValidPassword($password) {
    // Check that password has at least 10 characters, contains a number, and has no spaces
    return preg_match('/^(?=.*\d)\S{10,}$/', $password);
}