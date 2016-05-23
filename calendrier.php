<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Calendrier </title>
        <link rel="stylesheet" href="calendrier.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2" />
        
    </head>
    <body>
    	<?php 
         require('calendrier2.php');
         $date = new Date();
         $year=date('Y');
         $dates = $date->getAll($year);
    	?>
    	<div class="periods">
    	    <div class="year"> <?php echo $year; ?>
            </div>
            <div class="months">
            <u1>
                <?php foreach ($date->months as $id=>$m):?>
                    <li><a href="#" id="linkMonth"><?php echo utf8_encode(substr(utf8_decode($m),0,3)); ?></a></li>
                <?php endforeach; ?>
                </u1>
            </div>
    	    </div>	
    	    <?php $dates = current($dates); ?>
    	    <?php foreach ($dates as $m=>$days): ?>
    	    	<div class="month" id="month <?php echo $m; ?>">
    	    	<table>
    	    	<thead>
    	    		<tr>
    	    			<?php foreach ($date->days as $d): ?>
    	    				<th><?php echo substr($d,0,3);?></th>
    	    			<?php endforeach; ?>
    	    		</tr>
    	    	</thead>
    	    	<tbody>
    	    		<tr>
    	    			<?php $end=end($days); foreach ($days as $d=>$w): ?>
    	    				<?php if($d==1): ?>
    	    					<td colspan="<?php echo $w-1; ?>" class="padding"> </td>
    	    				<?php endif; ?>
    	    				<td>
    	    				<div class="relative">
    	    					<div class="day">
    	    						<?php echo $d; ?>
    	    					</div>
    	    				</div>
    	    				</td>
    	    				<?php if($w==7): ?>
    	    		</tr><tr>
    	    		    <?php endif; ?>
    	    			<?php endforeach; ?>
    	    			<?php if($end) !=7): ?>
    	    				<td colspan="<?php echo 7-$end; ?>" class="padding"> </td>
    	    			<?php endif; ?>
    	    		</tr>
    	    	</tbody>

    	</div>
    	<pre> <?php print_r($dates); ?> </pre>
    </body>
    </html>
