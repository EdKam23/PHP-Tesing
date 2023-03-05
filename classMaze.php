<?php
require_once __DIR__.'/classCell.php';

class Maze
{   
    public $mat, $startX, $startY, $finX, $finY, $minDist, $shortestPath;
    
    function __construct($sX,$sY, $fX, $fY)
    {
        $this->startX = $sX;
        $this->startY = $sY;
        $this->finX = $fX;
        $this->finY = $fY;        
    }

     function visualize()
    {
        echo '<b style="font:bold 18px Calibri;color: brown">'. " M A Z E  ". '</b>  ';
        echo "<table>";
        for($i=0; $i<=9; $i++)
        {
            echo "<tr>";
            for($j=0; $j<=9; $j++)
            {
                $randMat = round(rand(0,10));
                if (($i == $this->startX && $j == $this->startY) || ($i == $this->finX && $j == $this->finY)) 
                {
                    if ($i == $this->startX && $j == $this->startY) 
                        {
                            $this->mat[$i][$j] = 0;
                            echo "<td style=\"width:12px; height: 12px; background-color: green\">A</td>";
                        }  
                    if ($i == $this->finX && $j == $this->finY) 
                        {
                            $this->mat[$i][$j] = 0;
                            echo "<td style=\"width:12px; height: 12px;  opacity: 0.8; background-color: red\">B</td>";
                        } 
                    continue;
                }
                if($randMat<3)
                {
                    $this->mat[$i][$j] = 1;  
                    echo "<td style=\"width:12px; height: 12px; background-color: lightgray\">1</td>";
                }
                else
                {
                    $this->mat[$i][$j] = 0;
                    echo "<td>0</td>";
                }
            
            }
        }
        echo "</tr>";
        echo "<table>";
    }

    //============================== end visualize

    function shortPath()
    {   
      $row = 10;
      $col = 10;
      // array to check neigbors
      $dir = [ [ 0, 1 ], [ 0, -1 ],
                [ 1, 0 ], [ -1, 0 ] ];
      // Queue
      $q = [];
             
      $newCell = new Cell($this->startX, $this->startY, 0);
        
      // Insert the strt point.
      $q [] = $newCell;
                
      $this->minDist = PHP_INT_MAX/2;
     
      while (count($q) > 0)
      {   
         $newCell = $q[0];
         $path[]=array_shift($q);
         $currentDist = $newCell->dist;
  
         if ($newCell->x == $this->finX && $newCell->y == $this->finY)
         {
             $this->minDist = $currentDist;
             break;
         }
         // Check all four directions
         for($i = 0; $i < 4; $i++)
         {
             // Using the direction array
             $a = $newCell->x + $dir[$i][0];
             $b =$newCell->y + $dir[$i][1];
             
             // Not blocked and valid
             if ($a >= 0 && $b >= 0 && $a < $row && $b < $col && $this->mat[$a][$b] !=1)
             {
                 $this->mat[$a][$b] = 1;
                 $q[] = new Cell($a, $b, $currentDist + 1);
             }
         } 
      }
        //============================== JSON -$path

        $handle = fopen("path.txt", 'w+');     // create the file if needed
        if ($handle === null)
        {
            $handle = fopen("path.txt", 'w+');
        }

        if ($handle)
        {
          fseek($handle, 0, SEEK_END);

            // are we at the end of is the file empty
            if (ftell($handle) > 0)
            {
                // move back a byte
                fseek($handle, -1, SEEK_END);

                // add the trailing comma
                fwrite($handle, ',', 1);

                // add the new json string
                fwrite($handle, json_encode($path) . ']');
            }
            else
            {
                // write the first event inside an array
               fwrite($handle, json_encode(array($path)));
            }
            fclose($handle);
        }   
    
        $arrPathRaw = json_decode(file_get_contents('path.txt'), true);     

        $arrPath = [];
        $arrPath[] =  $arrPathRaw[0];       

        // remove unneeded demention of $arrPathRaw:
        foreach ($arrPathRaw as $arrPath)
        {
            if ( $arrPath[0] == 0 )
            {
                unset($arrPathRaw[0]);
            }
        }

        $newPath = [];
        $newPath[] = array_pop ($arrPath);
        
        if ($this->minDist != PHP_INT_MAX/2)
        {
            echo '<b style="font:bold 14px Calibri">'. $newPath[count($newPath) - 1]['x'].' : '.$newPath[count($newPath) - 1]['y']. '<br>';
            $this->shortestPath [] = $newPath[count($newPath) - 1]['x'].' : '.$newPath[count($newPath) - 1]['y'];
        }


        for ($j = count($arrPath); $j > 0; $j--)
        {
            if (
                  ($newPath[count($newPath) - 1]['dist'] - $arrPath[count($arrPath) - 1]['dist'] == 1) 
                  &&
                  ($newPath[count($newPath) - 1]['x'] - $arrPath[count($arrPath) - 1]['x'] > -2) && ($newPath[count($newPath) - 1]['x'] - $arrPath[count($arrPath) - 1]['x'] < 2) 
                  && 
                  ($newPath[count($newPath) - 1]['y'] - $arrPath[count($arrPath) - 1]['y'] > -2) && ($newPath[count($newPath) - 1]['y'] - $arrPath[count($arrPath) - 1]['y'] < 2)
                )                  

               {
                   $newPath[] = array_pop ($arrPath); 
                   if ($this->minDist != PHP_INT_MAX/2)
                    {
                        echo $newPath[count($newPath) - 1]['x'].' : '.$newPath[count($newPath) - 1]['y']. '<br>';
                        $this->shortestPath [] = $newPath[count($newPath) - 1]['x'].' : '.$newPath[count($newPath) - 1]['y'];
                    }
                }      
            else unset($arrPath[count($arrPath) - 1]);                
        }   

        if ($this->minDist != PHP_INT_MAX/2)
            echo "<br>The shortest path between A and B - ".$this->minDist." steps."; 
        else
            echo '<br><b style="font:bold 14px Calibri;color: brown">'."There is no path.";

          
        return $this->shortestPath;
    }
    

    function serializeThePath()
    {
        if ($this->minDist != PHP_INT_MAX/2)
        {
            $pathString = serialize($this->shortestPath);
            print "<hr/> Object <b>\$shortestPath:</b>  <pre>";print_r($this->shortestPath); print "</pre><hr/>";
            print " - Serialized object  <b> \$shortestPath</b>   <pre>";print_r($pathString); print "</pre><hr/>";
            $backup_path = unserialize($pathString);
            print " - Unserialized object <b> \$shortestPath</b>   <pre>";print_r($backup_path); print "</pre><hr/>";
        }
           
    }


}