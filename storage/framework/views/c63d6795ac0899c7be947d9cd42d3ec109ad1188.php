<?php $__env->startSection('content'); ?>
<div class="container-fluid">
                <div class="row content">
                            <aside class="col-lg-2  " style="border-color:black; border-style: solid; border-width: 1px  "   >
                                
                                    <ul class="navbar-nav mr-auto">
                                            <li class="nav-item ">
                                                <a class="nav-link " href="#"  role="button" aria-haspopup="true" aria-expanded="false">
                                                Descriptif
                                                </a>
                                                
                                            </li>
                                            <div class="dropdown-divider"></div>
                                        <li class="nav-item ">
                                          <a class="nav-link " href="<?php echo e(route('AffectProfRes')); ?>"  role="button"  aria-haspopup="true" aria-expanded="false">
                                            Affectation des profs responsables
                                          </a>
                                          
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li class="nav-item ">
                                          <a class="nav-link " href="<?php echo e(route('AffectProfEns')); ?>"  role="button"  aria-haspopup="true" aria-expanded="false">
                                            Affectation des profs enseignats
                                          </a>
                                          
                                        </li>
                                        
                                        
                                    </ul>
                                    
                                
                            </aside>
                        <section class="col-lg-10">
                             <?php echo $__env->yieldContent('content1'); ?>   
                        </section>
                    
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\echch\OneDrive\Bureau\working\DMIProject\resources\views/home_Chef_fil.blade.php ENDPATH**/ ?>