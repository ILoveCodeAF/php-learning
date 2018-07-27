<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>javascript</title>
	<meta charset="utf-8">
</head>
<body>
	<p id = "demo"></p>
	<button type="button" onclick="sort()">Sort</button>
	<script type="text/javascript">
		var string = "27838194829842989";
		//var char[string.length];
		var k = 5;
		//string[3] = '4';
		//string.sort();
		var i = 0,len = string.length;
		var array =[];
		for(i = 0; i<len; ++i){
			array[i] = string[i];
			//s.append(string[i]);// = string[i];
		}
		//s[0] = 0;
		function quicksort(temp, end, beg){
			var l = beg, r = end;
			var mid = temp[r]/2+temp[l]/2, c;
			mid = Math.floor(mid);
			//temp[end] = temp[l]/2+temp[r]/2;
			while(l<=r){
				while(temp[l]<mid){
					++l;
				}
				while(temp[r]>mid){
					--r;
				}
				if(l<=r){
					c = temp[l];
					temp[l] = temp[r];
					temp[r] = c;
					++l;
					--r;
				}
			}//document.getElementById("demo").innerHTML = l;
			if(r>beg)
				quicksort(temp,r,beg);
			if(l<end)
				quicksort(temp,end,l);
			// c = temp[end];
			// temp[end] = temp[beg];
			// temp[beg] = c;
			return;
		}
		function display(temp){
			var result = "";
			var len = temp.length;
			var i = 0;
			while(i<len){
				result = result+' '+temp[i];
				++i;
			}
			return result;
		}
		function sort(){
			quicksort(array,array.length-1,0);
			document.getElementById("demo").innerHTML = display(array);
		}
		//quicksort(array,array.length-1,0);

		document.getElementById("demo").innerHTML = display(array);//tring.length;ababababababababababc ababababababababab
		//bb
		//cccccccc
		//aab = aba = baa = b
		//aaa
		//abc = aa = cc;
		//aaa a
		//bcbab = abc = baab = cc abbbc bbbac 3 1 1 1 1 1 2 0 0
	</script>
</body>
</html>