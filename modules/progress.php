<?php

/**
 * @category  Social_Engineering
 * @package   FacebookToolkit++
 * @author    Wahyu Arif Purnomo <hi@warifp.co>
 * @copyright 2019 WARIFP
 * @license   MIT License <https://opensource.org/licenses/MIT>
 * @version   1.7
 * @link      https://github.com/warifp/FacebookToolkit
 * @since     15 June 2019
 */

$progress = $climate->progress()->total(100);

function progress($progress)
{
    for ($i = 0; $i <= 100; $i++) {
        $progress->current($i);
        usleep(30000);
    }
}
