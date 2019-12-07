<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>E-DMI App <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        
</head>

<body>
      <div id="app">  
        <header>
            
                
                
                <form   class="row" name="form1" method="post" action="<?php echo e(route('logout')); ?>">
                    <?php echo e(csrf_field()); ?>

                        <img  class="col-lg-3" src="<?php echo e(asset('Capture.png')); ?>" width="150" height="100" >
                        <div class="col-lg-7"></div>
                        <div  class=" col-lg-2 " >
                            <p><br>Welcome <?php echo e(\Auth::user()->name); ?></p>
                          <input  name="submit2" type="submit" id="submit2" class=" btn btn-dark" value="se deconnecter">
                      </div>
                        
                </form>
                              
        

                <nav class="navbar navbar-dark navbar-expand-lg bg-dark ">
                        
                    <!---<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
                        <a class="navbar-brand" href="#">MENU </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Etudiants
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item" href="http://localhost:8000/afficheStudents/<?php echo e($element->id); ?>"><?php echo e($element->name); ?></a>
                                    <div class="dropdown-divider"></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    </div>
                                </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Absences
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item" href="http://localhost:8000/markAbsence/<?php echo e($element->id); ?>"><?php echo e($element->name); ?></a>
                                    <div class="dropdown-divider"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Notes DS
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item" href="http://localhost:8000/AddDSMark/<?php echo e($element->id); ?>"><?php echo e($element->name); ?></a>
                                    <div class="dropdown-divider"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Notes Exam
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item" href="http://localhost:8000/AddExamMark/<?php echo e($element->id); ?>"><?php echo e($element->name); ?></a>
                                    <div class="dropdown-divider"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                            </li>
                          </ul>
                        </div>
                </nav>
        </header>




            <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
        





 
        <footer>

        </footer>




</body>
</html><?php /**PATH C:\Users\echch\OneDrive\Bureau\working\DMIProject\resources\views/layouts/app.blade.php ENDPATH**/ ?>