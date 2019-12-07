<?php $__env->startSection('content'); ?>
<div class="container" id="form">
    <form action="/AddModule" method="POST">
        <?php echo e(csrf_field()); ?>


        <input type="hidden" name="filiereId" value="<?php echo e($id); ?>">
        <div class="tab_step" style="display: block;">
	        <fieldset id="semestre1">
			    <legend>Semestre 1:</legend>
			    <input type="hidden" name="module_in1" id="module_in1" value="1"><!-- ca sert au nom des modules -->

			    <fieldset id="module1">
			    	<legend>Module 1:</legend>
			    	<input type="hidden" name="nb_elements[]" id="element_in1" value="1"><!-- compte des elements dans chaque module -->
		            <div class="form-group">
		                <label for="usr">Module name:</label>
		                <input type="text" name="module_name[]" class="form-control" required>
		            </div>
		            <div class="form-group">
		                <label for="usr">Module code:</label>
		                <input type="text" name="module_code[]" class="form-control" required>
		            </div>
		            <input type="hidden" name="semestre[]" value="1">

		            <div id="element_container"></div>
			        <div class="form-group">
			            <button type="button" id="addEle_1_1" onclick="
			            var elmnt_id=event.target.id;
					    var tab=elmnt_id.split('_');
				        var j=new Number(tab[2]);
				        var prnt=document.querySelectorAll('#semestre1 #module'+j)[0];
				        var k=new Number(prnt.querySelectorAll('#element_in'+j)[0].value);
				        prnt.querySelectorAll('#element_in'+j)[0].value=(k+1);
				        var clone=document.getElementById('element').cloneNode(true);
				        clone.querySelectorAll('#name_ele')[0].innerHTML='Element '+k;
				        clone.setAttribute('style','display:block;');
				        var container=prnt.querySelectorAll('#element_container')[0];
				        container.appendChild(clone);
			            ">Add Element</button>
			        </div>
		    	</fieldset>


			</fieldset>

			<div class="form-group">
			    <button type="button" id="addMod_1" onclick="
			    var container=document.getElementById('semestre1');
		        var j=new Number(document.getElementById('module_in1').value);//unique
		        var clone=document.getElementById('module').cloneNode(true);
		        clone.setAttribute('id','module'+(j+1));
		        var name=clone.querySelectorAll('#name_mod')[0];
		        name.innerHTML='module'+(j+1)+':';
		        var child1=clone.querySelectorAll('#addEle_1_1')[0];//a modifier
		        child1.setAttribute('id','addEle_1_'+(j+1));
		        var child2=clone.querySelectorAll('#element_in1')[0];
		        child2.setAttribute('id','element_in'+(j+1));
		        var child3=clone.querySelectorAll('#nb_semestre');
		        child3.value=1;
		        clone.setAttribute('style','display: block;');
		        container.appendChild(clone);
		        document.getElementById('module_in1').value=(j+1);
			    ">Add Module </button>
			</div>
		</div>

        <?php for($i=2;$i<=$nb_semestre;$i++): ?>
        <div class="tab_step" style="display: none;">
	        <fieldset id="semestre<?php echo e($i); ?>">
			    <legend>Semestre <?php echo e($i); ?>:</legend>
			    <input type="hidden" name="module_in<?php echo e($i); ?>" id="module_in<?php echo e($i); ?>" value="1"><!-- ca sert au nom des modules -->

			    <fieldset id="module1">
			    	<legend>Module 1:</legend>
			    	<input type="hidden" name="nb_elements[]" id="element_in1" value="1"><!-- compte des elements dans chaque module -->
		            <div class="form-group">
		                <label for="usr">Module name:</label>
		                <input type="text" name="module_name[]" class="form-control" required>
		            </div>
		            <div class="form-group">
		                <label for="usr">Module code:</label>
		                <input type="text" name="module_code[]" class="form-control" required>
		            </div>
		            <input type="hidden" name="semestre[]" value="<?php echo e($i); ?>">

		            <div id="element_container"></div>
			        <div class="form-group">
			            <button type="button" id="addEle_<?php echo e($i); ?>_1" onclick="
			            var elmnt_id=event.target.id;
					    var tab=elmnt_id.split('_');
				        var j=new Number(tab[2]);
				        var prnt=document.querySelectorAll('#semestre<?php echo e($i); ?> #module'+j)[0];
				        var k=new Number(prnt.querySelectorAll('#element_in'+j)[0].value);
				        prnt.querySelectorAll('#element_in'+j)[0].value=(k+1);
				        var clone=document.getElementById('element').cloneNode(true);
				        clone.querySelectorAll('#name_ele')[0].innerHTML='Element '+k;
				        clone.setAttribute('style','display:block;');
				        var container=prnt.querySelectorAll('#element_container')[0];
				        container.appendChild(clone);
				        ">Add Element</button>
			        </div>
		    	</fieldset>


			</fieldset>

			<div class="form-group">
			    <button type="button" id="addMod_<?php echo e($i); ?>" onclick="
			    var container=document.getElementById('semestre<?php echo e($i); ?>');
		        var j=new Number(document.getElementById('module_in<?php echo e($i); ?>').value);//unique
		        var clone=document.getElementById('module').cloneNode(true);
		        clone.setAttribute('id','module'+(j+1));
		        clone.querySelectorAll('#name_mod')[0].innerHTML='module'+(j+1);
		        var child1=clone.querySelectorAll('#addEle_1_1')[0];//a modifier
		        child1.setAttribute('id','addEle_<?php echo e($i); ?>_'+(j+1));
		        var child2=clone.querySelectorAll('#element_in1')[0];
		        child2.setAttribute('id','element_in'+(j+1));
		        var child3=clone.querySelectorAll('#nb_semestre');
		        child3.value=<?php echo e($i); ?>;
		        clone.setAttribute('style','display: block;');
		        container.appendChild(clone);
		        document.getElementById('module_in<?php echo e($i); ?>').value=(j+1);
			    ">Add Module </button>
			</div>
		</div>

		<?php endfor; ?>

        <input type="submit" id="submit" value="Sauvegard" class="btn btn-primary" style="display: none;">
    </form>

    <button type="button" id="previous" style="display: none;"onclick="
    var i,x=document.getElementsByClassName('tab_step');
    for(i=0;i<x.length;i++){
    	if(x[i].getAttribute('style')=='display: block;'){
    		x[i].setAttribute('style','display: none;');
    		x[i-1].setAttribute('style','display: block;');
			if(i==1){
    			var y=getElementById('submit');
    			y.setAttribute('style','display: none;');
    			var p=getElementById('previous');
    			p.setAttribute('style','display: none;');
    			var n=getElementById('next');
    			n.setAttribute('style','display: inline;');
    		}
    		else{
    			var y=getElementById('submit');
    			y.setAttribute('style','display: none;');
    			var p=getElementById('previous');
    			p.setAttribute('style','display: inline;');
    			var n=getElementById('next');
    			n.setAttribute('style','display: inline;');
    		}
    		break;
    	}
    }
    ">previous</button>

    <button type="button" id="next" onclick="
    var i,x=document.getElementsByClassName('tab_step');
    for(i=0;i<x.length;i++){
    	if(x[i].getAttribute('style')=='display: block;'){
    		x[i].setAttribute('style','display: none;');
    		x[i+1].setAttribute('style','display: block;');
    		if(i==x.length-2){
    			var y=getElementById('submit');
    			y.setAttribute('style','display: block;');
    			var n=getElementById('next');
    			n.setAttribute('style','display: none;');
    			var p=getElementById('previous');
    			p.setAttribute('style','display: inline;');
    		}
	    	else{
	    		var y=getElementById('submit');
	    		y.setAttribute('style','display: none;');
	    		var p=getElementById('previous');
	    		p.setAttribute('style','display: inline;');
	    		var n=getElementById('next');
	    		n.setAttribute('style','display: inline;');
	    	}
    		break;
    	}
    }
    ">Next</button>





    	<!-- hidden fields -->
			<fieldset id="element" style="display:none;">
				<legend id="name_ele">Element 1:</legend>
			    <div class="form-group">
				<label for="usr">Element name:</label>
			    <input type="text" name="element_name[]" class="form-control">
			    </div>
			    <div class="form-group">
			    <label for="usr">Element code:</label>
			    <input type="text" name="element_code[]" class="form-control">
			    </div>
			</fieldset>


			<fieldset id="module" style="display: none;">
		    	<legend id="name_mod">Module 1:</legend>
		    	<input type="hidden" name="nb_elements[]" id="element_in1" value="1"><!-- compte des elements dans chaque module -->
	            <div class="form-group">
	                <label for="usr">Module name:</label>
	                <input type="text" name="module_name[]" class="form-control">
	            </div>
	            <div class="form-group">
	                <label for="usr">Module code:</label>
	                <input type="text" name="module_code[]" class="form-control">
	            </div>
	            <input type="hidden" id="nb_semestre" name="semestre[]" value="1">

	            <div id="element_container"></div>
		        <div class="form-group">
		            <button type="button" id="addEle_1_1" onclick="
		            var elmnt_id=event.target.id;
				    var tab=elmnt_id.split('_');
			        var j=new Number(tab[2]);
			        var prnt=document.querySelectorAll('#semestre'+tab[1]+' #module'+j)[0];
			        var k=new Number(prnt.querySelectorAll('#element_in'+j)[0].value);
			        prnt.querySelectorAll('#element_in'+j)[0].value=(k+1);
			        var clone=document.getElementById('element').cloneNode(true);
			        clone.querySelectorAll('#name_ele')[0].innerHTML='Element '+k;
			        clone.setAttribute('style','display:block;');
			        var container=prnt.querySelectorAll('#element_container')[0];
			        container.appendChild(clone);
		            ">Add Element</button>
		        </div>
	    	</fieldset>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home_Admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\echch\OneDrive\Bureau\working\DMIProject\resources\views/manage/AddModule.blade.php ENDPATH**/ ?>