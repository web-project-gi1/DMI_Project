<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Filiere;
use App\Module;
use App\User;
use App\Role;
use App\Role_user;
use App\Element;
use App\Student;
use App\Student_element;
use Illuminate\Http\Request;
use App\Exports\Fichier_Export;
use Maatwebsite\Excel\Facades\Excel;

class manageController extends Controller
{
    //
    public function students_export(){
        return Excel::download(new Fichier_Export, 'Liste.xlsx');
    }



    public function AddFiliere(Request $request){
        if($request->isMethod('post')){
            $newfiliere= new Filiere();
            $newfiliere->name=$request->input('filiere_name');
            $newfiliere->code=$request->input('filiere_code');
            $newfiliere->nb_semestre=$request->input('nb_semestre');
            $newfiliere->save();
            $arr=Array('id'=>$newfiliere->id,'nb_semestre'=>$newfiliere->nb_semestre);
            return view('manage.AddModule',$arr);
        }
        return view('manage.AddFiliere');
    }


    public function AddModule(Request $request){
    	if($request->isMethod('post')){
            $cmp=0;
            $i=0;
            $length=count($request->input('module_name'));
            while($i<$length){
                $newmodule= new Module();
                $newmodule->name=$request->input('module_name')[$i];
                $newmodule->code=$request->input('module_code')[$i];
                $newmodule->semestre=$request->input('semestre')[$i];
                $newmodule->filiereId=$request->input('filiereId');
                $newmodule->save();
                $nb_elements=($request->input('nb_elements')[$i])-1;
                if($nb_elements==0){
                    $newelement= new Element();
                    $newelement->name=$newmodule->name;
                    $newelement->code=$newmodule->code;
                    $newelement->moduleId=$newmodule->id;
                    $newelement->save();
                }
                else{
                    for($j=$cmp;$j<$cmp+$nb_elements;$j++){
                        $newelement= new Element();
                        $newelement->name=$request->input('element_name')[$j];
                        $newelement->code=$request->input('element_code')[$j];
                        $newelement->moduleId=$newmodule->id;
                        $newelement->save();
                    }
                    $cmp+=$nb_elements;
                }
                $i++;
            }
            $filieres=Filiere::all();
            $arr=Array('filieres'=>$filieres);
    		return view('manage.view_filieres',$arr);
    	}
    	return view('manage.AddModule');
    }




    public function AddStudent(Request $request){
    	if($request->isMethod('post')){
    		$newstudent= new Student();
    		$newstudent->name=$request->input('name');
    		$newstudent->massar=$request->input('massar');
            $newstudent->level=$request->input('level');
    		$newstudent->save();

            //associer l'etudiant au elements qu'il etudie
            $tab=explode(" ",$newstudent->level);
            $filiere_code=$tab[0];
            $level=$tab[1];
            $filiere = Filiere::where('code', $filiere_code)->first();
            $modules = $filiere->modules()->where([['semestre', '>=', 2*$level-1],['semestre', '<=', 2*$level],])->get();
            foreach($modules as $module){
                foreach($module->elements as $element){
                    $association=new Student_element();
                    $association->studentId=$newstudent->id;
                    $association->elementId=$element->id;
                    $association->save();
                }
            }

    		return redirect('home_'.ucfirst(\Auth::user()->role));
    	}
        $filieres = DB::table('filieres')->select('id','name','code','nb_semestre')->get();
        $arr=Array('filiere'=>$filieres);
    	return view('manage.AddStudent',$arr);
    }



    public function addAbsence(Request $request,$id){
        if($request->isMethod('post')){
            foreach($request->input('absence') as $student_id){
                $association=Student_element::where([['studentId', $student_id],['elementId', $id],])->first();
                $association->absence+=1;
                $association->save();
            }
            return redirect('home_'.ucfirst(\Auth::user()->role));
        }
        $students=Array();
        $associations=Student_element::where('elementId',$id)->get();
        $i=0;
        foreach ($associations as $association) {
            $students[$i++]=Student::find($association->studentId);
        }
        $elements=Element::where('userId',\Auth::user()->id)->get();
        $arr=Array('students'=>$students,'elements'=>$elements,'id'=>$id);
        return view('manage.markAbsence',$arr);
    }



    public function addDSMark(Request $request,$id){
        if($request->isMethod('post')){
            $i=0;
            foreach($request->input('student') as $student_id){
                $association=Student_element::where([['studentId', $student_id],['elementId', $id],])->first();
                $association->DS_Mark=$request->input('Mark')[$i++];
                $association->save();
            }
            return redirect('home_'.ucfirst(\Auth::user()->role));
        }
        $students=Array();
        $associations=Student_element::where('elementId',$id)->get();
        $i=0;
        foreach ($associations as $association) {
            $students[$i++]=Student::find($association->studentId);
        }
        $elements=Element::where('userId',\Auth::user()->id)->get();
        $arr=Array('students'=>$students,'elements'=>$elements,'id'=>$id);
        return view('manage.AddDSMark',$arr);
    }



    public function addExamMark(Request $request,$id){
        if($request->isMethode('post')){
            $i=0;
            foreach($request->input('student') as $student_id){
                $association=Student_element::where([['studentId', $student_id],['elementId', $id],])->first();
                $association->exam_Mark=$request->input('Mark')[$i++];
                $association->save();
            }
            return redirect('home_'.ucfirst(\Auth::user()->role));
        }
        $students=Array();
        $associations=Student_element::where('elementId',$id)->get();
        $i=0;
        foreach ($associations as $association) {
            $students[$i++]=Student::find($association->studentId);
        }
        $elements=Element::where('userId',\Auth::user()->id)->get();
        $arr=Array('students'=>$students,'elements'=>$elements,'id'=>$id);
        return view('manage.AddExamMark',$arr);
    }



    public function afficheStudents($id){
        $students=Array();
        $associations=Student_element::where('elementId',$id)->get();
        $i=0;
        foreach ($associations as $association) {
            $students[$i++]=Student::find($association->studentId);
        }
        $elements=Element::where('userId',\Auth::user()->id)->get();
        $arr=Array('students'=>$students,'elements'=>$elements);
        return view('manage.afficheStudents',$arr);
    }

    public function AddAccount(Request $request){
        if($request->isMethod('post')){
            $newaccount=new User();
            $newaccount->name=$request->input('name');
            $newaccount->email=$request->input('email');
            $newaccount->password=Hash::make($request->input('password'));
            $newaccount->role=$request->input('role');
            $newaccount->save();
            return redirect('home_'.ucfirst(\Auth::user()->role));
        }
        return view('manage.AddAccount');
    }

    public function AffectChefFil(Request $request){
        if($request->isMethod('post')){
            $i=0;
            $arr=$request->input('filiere');
            foreach($arr as $fil){
                $filiere=Filiere::find($fil);
                $oldchef=User::find($filiere->userId);
                if(!empty($oldchef)){
                    $oldchef->role='prof';
                    $oldchef->save();
                }
                $newchef=User::find($request->input('chef')[$i]);
                $filiere->userId=$newchef->id;
                $newchef->role='chef_fil';
                $filiere->save();
                $newchef->save();
                $i++;
            }
            return redirect('home_'.ucfirst(\Auth::user()->role));
        }
        $profs=User::where('role','!=','admin')->get();
        $filieres=Filiere::All();
        $elements=Element::where('userId',\Auth::user()->id)->get();
        $arr=Array('filieres'=>$filieres,'profs'=>$profs,'elements'=>$elements);
        return view('manage.AffectChefFil',$arr);
    }

    public function AffectProfRes(Request $request){
        if($request->isMethod('post')){
            $length=count($request->input('module'));
            for($i=0;$i<$length;$i++){
                $newresp=User::find($request->input('resp')[$i]);
                $module=Module::find($request->input('module')[$i]);
                $module->userId=$newresp->id;
                $module->save();
                $newresp->save();
            }
            return redirect('home_'.ucfirst(\Auth::user()->role));
        }
        $profs=User::where('role','!=','admin')->get();
        // $filiere=Filiere::where('userId',\Auth::user()->id)->first();
        $filiere=\Auth::user()->filiere;
        // $modules=Module::where('filiereId',$filiere->id);
        $modules=$filiere->modules;
        // $elements=Element::where('userId',\Auth::user()->id)->get();
        $elements=\Auth::user()->elements;
        $arr=Array('modules'=>$modules,'profs'=>$profs,'elements'=>$elements);
        return view('manage.AffectProfRes',$arr);
    }


    public function AffectProfEns(Request $request){
        if($request->isMethod('post')){
            $length=count($request->input('element'));
            for($i=0;$i<$length;$i++){
                $element=Element::find($request->input('element')[$i]);
                $element->userId=$request->input('ens')[$i];
                $element->save();
            }
            return redirect('home_'.ucfirst(\Auth::user()->role));
        }
        $profs=User::where('role','!=','admin')->get();
        // $filiere=Filiere::where('userId',\Auth::user()->id)->first();
        $filiere=\Auth::user()->filiere;
        // $modules=Module::where('filiereId',$filiere->id);
        $modules=$filiere->modules;
        $i=0;
        foreach($modules as $module) {
            // $elements_ens[]=Element::where('moduleId',$module->id)->get();
            $elems=$module->elements;
            foreach ($elems as $elem) {
                $elements_ens[$i]=$elem;
                $i++;
            }
        }
        // $elements=Element::where('userId',\Auth::user()->id)->get();
        $elements=\Auth::user()->elements;
        $arr=Array('elements_ens'=>$elements_ens,'profs'=>$profs,'elements'=>$elements);
        return view('manage.AffectProfEns',$arr);
    }
}
