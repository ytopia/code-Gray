<?php
class Gray
{
	public function grayencode($g) 
	{
    	return decbin($g ^ ($g >> 1));
	}
	public function nextGray($prev) {
        $x = (int)$prev;
        $ct = ($x >> 16) ^ $x; // вычислить соотношение для x
        $ct = ($ct >> 8) ^ $ct;
        $ct = ($ct >> 4) ^ $ct;
        $ct = ($ct >> 2) ^ $ct;
        $ct = ($ct >> 1) ^ $ct;
        if(($ct & 1) == 0) { // если соотношение чётное, то поменять первый бит
            $x =$x ^ 1;
        } else { // иначе поменять бит сразу выше последней 1
            $y = $x ^ ($x & ($x - 1)); // сначала вычислить последнюю 1
            $y = ($y << 1) & 0xFF;
            $x = ($y == 0 ? 0 : $x ^ $y);
        }
        return (decbin($x));
    }
}
