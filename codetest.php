<?php 




?>



<div style="float:left;">

	<form name="OEFORM" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="hidden" value="OE" name="type"/>
		Detailed Question Description: 
		<textarea rows="8" cols="70" name="Q_desc"></textarea>
		<hr/>
	Provide four testcases to test the written code.<br/>
	<center>
		Testcase 1 :- <input type="text" name="T1" placeholder="test case 1"/><br/>
		Testcase 2 :- <input type="text" name="T2" placeholder="test case 2"/><br/>
		Testcase 3 :- <input type="text" name="T3" placeholder="test case 3"/><br/>
		Testcase 4 :- <input type="text" name="T4" placeholder="test case 4"/>
	</center>
	<hr/>
		<center>
			Write any javacode below that you would like to provide the user with. If not leave 
			blank.
			<textarea rows="3" cols="70" name="Q_help_code"></textarea>
		</center>
	<hr/>
</div>

<div style="float:right;">
</div>