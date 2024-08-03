<?php

print "Subsequences: \n";

class TheSubsequences {
    public function __construct() {
        var_dump($this->count(26, 69, 3));
        var_dump($this->count(11, 100, 4));
        var_dump($this->count(77, 78, 4));
        var_dump($this->count(13834, 26066, 1380));
        var_dump($this->count(1, 1000000, 1));
        var_dump($this->count(25272, 31576, 757));
        var_dump($this->count(23051, 27967, 62));
        var_dump($this->count(6122, 30043, 8));
        var_dump($this->count(10, 999999, 46));
        var_dump($this->count(9, 6405, 95));
    }  
 
    private function containsSubsequence(string $sequence, string $sub): bool {
        $j = 0;

        for ($i = 0; $i < strlen($sequence) && $j < strlen($sub); $i++) {
            if ($sequence[$i] == $sub[$j]) {
                $j++;
            }
        }

        return $j == strlen($sub);
    }

    public function count(int $start, int $end, int $search): int {
        $x = 0;
    
        for ($i = $start; $i <= $end; $i++) {
            if ($this->containsSubsequence($i, $search)) {
                $x++;
            }
        }
        
        return $x;
    }
}

new TheSubsequences();


print "============================================ \n";


print "Candy Crush: \n";

class CandyCrush {
    public function __construct() {
        var_dump($this->howLong([1,2,3,4], 0));

        var_dump($this->howLong([1,2,10,4], 0));

        var_dump($this->howLong([10,1,3,4,7], 2));

        var_dump($this->howLong([10,2,3,4,7], 2));

        var_dump($this->howLong([3,3,1,3,4,4,1,3], 7));

        var_dump($this->howLong([1,2,4,3,4,3,1,3,3,4], 1));

        var_dump($this->howLong([2,1,4,4,1,1,1,1,2,1], 6));

        var_dump(
            $this->howLong([950,501,913,2,636,287,753,5,126,1,305,2,712,3,1,5,4,26,715,532,2,4,98,3,296,4,184,
            1,154,541,2,4,2,141,577,376,67,3,424,360,521,5,4,5,4,886,3,5,5,334], 28)
        );

        var_dump(
            $this->howLong([2,4,2,4,803,1,996,855,682,3,2,5,1,5,225,3,4,5,49,189,3,328,5,494,863,390,2,1,810,4,
            819,5,4,645,691,5,279,82,202,368,546,1,1,2,488,4,163,2,487,486], 12)
        );

        var_dump(
            $this->howLong([288,1,256,327,723,432,674,196,218,90,6,563,643,431,351,948,546,282,705,805,864,
            229,99,499,865,986,218,961,434,12,338,255,91,797,406,519,242,329,578,220,912,866,702,412,456,
            430,702,688,397,222,792,153,155,784,957,413,401,167,76,586,429,306,124,498,136,258,152,752,660,
            136,160,378,771,358,861,296,658,988,173,740,350,879,32,362,597,125,345,2,193,420,417,51,808,195,
            169,50,703,505,327,579], 0)
        );
    }

    public function howLong(array $times, int $position): int {
        $stepCount = 0;

        $start = $position;
        $end = $position;
		
		$moveRight = true;
		$moveLeft = true;

        while ($moveLeft || $moveRight) {
            $stepCount++;
			
			$moveLeft = $start > 0 && $times[$start - 1] > $stepCount;
			$moveRight = $end < count($times) - 1 && $times[$end + 1] > $stepCount;

			if ($moveLeft) {
				$start--;
			}

			if ($moveRight) {
				$end++;
			}

        }

        return max(array_slice($times, $start, $end - $start + 1));
    }
}

new CandyCrush();


