<!DOCTYPE htm>
<!DOCTYPE html>
<html>
<head>
	<title>matrix</title>
	<meta charset="utf-8">
</head>
<body>
	<h3>Matrix</h3>
	<?php
		//echo "here";
		function display($matrix, $n){
			$i = 0;
			echo $n."<br>";
			while($i<$n){
				$j = 0;
				while($j<$n){
					echo $matrix[$i*$n+$j].' ';
					++$j;
				}
				echo "<br>";
				++$i;
			}
		}
		class node{
			public $next;
			public $previous;
			public $data;
			public function __construct($item){
				$this->data = $item;
				$this->next = null;
				$this->previous = null;
			}
		}
		//$node = new node(3);
		//echo "node = ".$node->data."<br>";
		class queue{
			private $front;
			private $back;
			private $temp;

			public function __construct(){
				$this->front = $this->back = $this->temp = null;
			}
			public function push($item){
				if($this->back == null){
					//echo $item."well<br>";
					$this->back = new node($item);
					//echo $this->back->data . 'xD<br>';
					if($this->front == null)
						$this->front = $this->back;
				}
				else{
					$this->temp = $this->back;
					$this->back = new node($item);
					$this->back->next = $this->temp;
					$this->temp->previous = $this->back;
				}
				return;
			}
			public function pop(){
				if($this->isempty()){
					return "error: queue is empty";
				}
				$data = $this->front->data;
				$this->front = $this->front->previous;
				if($this->front == null){
					$this->back = $this->temp = null;
				}
				return $data;
			}
			public function isempty(){
				return ($this->front == null || $this->back == null);
			}

		}
		function bfs($beg, $matrix, $n){
			if($beg<1 || $beg>$n)
				return "error: ".$beg." is not a vertex.";
			$beg--;
			$q = new queue();
			//echo $q->pop().'<br>';
			//echo "beg = ".$beg."<br>";
			$marked = [];
			$i = 0;
			while($i<$n){
				$marked[i] = false;
				++$i;
			}

			$q->push($beg);
			$marked[$beg] = true;
			while(!$q->isempty()){
				$i = $q->pop();
				//echo "i = /".$i."/ xd";
				echo ($i+1).' ';
				$j = 0;
				while($j<$n){
					if($matrix[$i*$n+$j]){
						if($marked[$j] == false){
							$q->push($j);
							$marked[$j] = true;
						}
					}
					++$j;
				}
			}
		}
		//echo "here";
		$file = fopen("matrix.txt", "r") or die ("Unable to open file!");
		$n = fgets($file);
		$i = 0;
		//echo "here";
		$matrix = [];
		while($i<$n){//!feof($file)){
			$s = fgets($file);
			//$j = strlen($s)/2;
			$j = 0;
			$k = 0;
			while($k<strlen($s)){
				if($s[$k]!=' '){
					$matrix[$i*$n+$j] = $s[$k];
					$j++;
				}
				++$k;
			}
			//fgetc($file);
			++$i;
		}
		display($matrix, $n);
		echo "<br>";
		echo bfs(3, $matrix, $n);
	?>
</body>
</html>