<?php

const host = 'localhost';
const db = 'Prueba';
const user = 'root';
const pass = 'secret';

$connect = new mysqli(self::host, self::user, self::pass, self::db);
