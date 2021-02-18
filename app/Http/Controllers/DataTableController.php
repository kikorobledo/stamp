<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\User;
use App\Models\Cupon;
use App\Models\Codigo;
use App\Models\Category;
use App\Models\Comentario;
use App\Models\Establecimiento;
use Yajra\DataTables\DataTables;

class DataTableController extends Controller
{
    public function tags(){

    return Datatables::of(Tag::query()->orderBy('id', 'DESC'))
                            ->editColumn('created_at', function($tag){
                                return $tag->created_at->diffForHumans();
                            })
                            ->editColumn('updated_at', function($tag){
                                return $tag->updated_at->diffForHumans();
                            })
                            ->addColumn('actions', function($tag){
                                $editUrl = route('admin.tags.edit', $tag);
                                $deleteUrl = route('admin.tags.destroy', $tag);
                                $id = $tag->id;

                                return view('ui.actionButtons', compact('editUrl', 'deleteUrl','id'));
                              })
                            ->make(true);
    }

    public function categories(){

        return Datatables::of(Category::query()->orderBy('id', 'DESC'))
                                ->editColumn('created_at', function($category){
                                    return $category->created_at->diffForHumans();
                                })
                                ->editColumn('updated_at', function($category){
                                    return $category->updated_at->diffForHumans();
                                })
                                ->addColumn('actions', function($category){
                                    $editUrl = route('admin.categories.edit', $category);
                                    $deleteUrl = route('admin.categories.destroy', $category);
                                    $id = $category->id;

                                    return view('ui.actionButtons', compact('editUrl', 'deleteUrl','id'));
                                  })
                                ->make(true);
    }

    public function users(){

        return Datatables::of(User::query()->orderBy('id', 'DESC'))
                                ->editColumn('created_at', function($user){
                                    return $user->created_at->diffForHumans();
                                })
                                ->editColumn('updated_at', function($user){
                                    return $user->updated_at->diffForHumans();
                                })
                                ->addColumn('role', function($user){
                                    return $user->roles[0]->name;
                                })
                                ->addColumn('foto', function($user){
                                    $foto = $user->profile_photo_url;

                                    return view('ui.img', compact('foto'));
                                })
                                ->addColumn('actions', function($user){
                                    $editUrl = route('admin.users.edit', $user);
                                    $deleteUrl = route('admin.users.destroy', $user);
                                    $id = $user->id;

                                    return view('ui.actionButtons', compact('editUrl', 'deleteUrl','id'));
                                  })
                                ->make(true);
    }

    public function establecimientos(){

        return Datatables::of(Establecimiento::query()->orderBy('id', 'DESC'))
                                ->editColumn('created_at', function($establecimiento){
                                    return $establecimiento->created_at->diffForHumans();
                                })
                                ->editColumn('updated_at', function($establecimiento){
                                    return $establecimiento->updated_at->diffForHumans();
                                })
                                ->editColumn('estado', function($establecimiento){
                                    return ucfirst($establecimiento->estado);
                                })
                                ->editColumn('premium', function($establecimiento){
                                    $text = '';
                                    if($establecimiento->premium){
                                        $text = 'Premium';
                                    }else{
                                        $text = 'Free';
                                    }
                                    return $text;
                                })
                                ->editColumn('user_id', function($establecimiento){
                                    $user = $establecimiento->usuario;
                                    $editUrl = route('admin.users.edit', $user);
                                    $obj = $user->name;
                                    return  view('ui.link', compact('obj', 'editUrl'));
                                })
                                ->editColumn('category_id', function($establecimiento){
                                    $category = $establecimiento->category;
                                    $editUrl = route('admin.categories.edit', $category);
                                    $obj = $category->nombre;
                                    return  view('ui.link', compact('obj', 'editUrl'));
                                })
                                ->addColumn('imagen', function($establecimiento){
                                    if($establecimiento->imagen)
                                        $foto = asset('storage/'. $establecimiento->imagen->url);
                                    else
                                        $foto = null;
                                    return  view('ui.img', compact('foto'));
                                })
                                ->addColumn('actions', function($establecimiento){
                                    $editUrl = route('admin.establecimientos.edit', $establecimiento);
                                    $deleteUrl = route('admin.establecimientos.destroy', $establecimiento);
                                    $id = $establecimiento->id;

                                    return view('ui.actionButtons', compact('editUrl', 'deleteUrl','id'));
                                })
                                ->make(true);
    }

    public function cupones(){

        return Datatables::of(Cupon::query()->orderBy('id', 'DESC'))
                                ->editColumn('created_at', function($cupon){
                                    return $cupon->created_at->diffForHumans();
                                })
                                ->editColumn('updated_at', function($cupon){
                                    return $cupon->updated_at->diffForHumans();
                                })
                                ->editColumn('estado', function($establecimiento){
                                    return ucfirst($establecimiento->estado);
                                })
                                ->editColumn('precio', function($cupon){
                                    if($cupon->precio == null)
                                        return "$ 0.00";
                                    else
                                        return "$ " . $cupon->precio;
                                })
                                ->addColumn('usuario', function($cupon){
                                    $user = $cupon->establecimiento->usuario;
                                    $editUrl = route('admin.users.edit', $user);
                                    $obj = $user->name;
                                    return  view('ui.link', compact('obj', 'editUrl'));
                                })
                                ->addColumn('establecimiento', function($cupon){
                                    $establecimiento = $cupon->establecimiento;
                                    $editUrl = route('admin.establecimientos.edit', $establecimiento);
                                    $obj = $establecimiento->nombre;
                                    return  view('ui.link', compact('obj', 'editUrl'));
                                })
                                ->addColumn('categoria', function($cupon){
                                    $categoria = $cupon->establecimiento->category;
                                    $editUrl = route('admin.categories.edit', $categoria);
                                    $obj = $categoria->nombre;
                                    return  view('ui.link', compact('obj', 'editUrl'));
                                })
                                ->addColumn('imagen', function($cupon){
                                    if($cupon->imagen)
                                        $foto = asset('storage/'. $cupon->imagen->url);
                                    else
                                        $foto = null;
                                    return  view('ui.img', compact('foto'));
                                })
                                ->addColumn('actions', function($cupon){
                                    $editUrl = route('admin.cupones.edit', $cupon);
                                    $deleteUrl = route('admin.cupones.destroy', $cupon);
                                    $id = $cupon->id;

                                    return view('ui.actionButtons', compact('editUrl', 'deleteUrl','id'));
                                })
                                ->make(true);
    }

    public function codigos(){

        return Datatables::of(Codigo::query()->orderBy('id', 'DESC'))
                                ->editColumn('created_at', function($codigo){
                                    return $codigo->created_at->diffForHumans();
                                })
                                ->editColumn('updated_at', function($codigo){
                                    return $codigo->updated_at->diffForHumans();
                                })
                                ->editColumn('canjeado_el', function($codigo){
                                    if(! $codigo->canjeado_el)
                                        return "Aún disponible";
                                    else
                                        return Carbon::parse($codigo->canjeado_el)->diffForHumans();
                                })
                                ->editColumn('canjeado_por', function($codigo){
                                    if(! $codigo->canjeado_por)
                                        return "Aún disponible";
                                    else{
                                        $usuario = $codigo->canjeadoPor;
                                        $editUrl = route('admin.users.edit', $usuario);
                                        $obj = $usuario->name;
                                        return  view('ui.link', compact('obj', 'editUrl'));
                                    }
                                })
                                ->addColumn('establecimiento', function($codigo){
                                    $establecimiento = $codigo->cupon->establecimiento;
                                    $editUrl = route('admin.establecimientos.edit', $establecimiento);
                                    $obj = $establecimiento->nombre;
                                    return  view('ui.link', compact('obj', 'editUrl'));
                                })
                                ->addColumn('cupon', function($codigo){
                                    $cupon = $codigo->cupon;
                                    $editUrl = route('admin.cupones.edit', $cupon);
                                    $obj = $cupon->nombre;
                                    return  view('ui.link', compact('obj', 'editUrl'));
                                })
                                ->addColumn('actions', function($codigo){
                                    $editUrl = route('admin.codigos.edit', $codigo);
                                    $deleteUrl = route('admin.codigos.destroy', $codigo);
                                    $id = $codigo->id;

                                    return view('ui.actionButtons', compact('editUrl', 'deleteUrl','id'));
                                })
                                ->make(true);
    }

    public function comentarios(){

        return Datatables::of(Comentario::query()->orderBy('id', 'DESC'))
                                ->editColumn('created_at', function($comentario){
                                    return $comentario->created_at->diffForHumans();
                                })
                                ->editColumn('updated_at', function($comentario){
                                    return $comentario->updated_at->diffForHumans();
                                })
                                ->addColumn('establecimiento', function($comentario){
                                    $establecimiento = $comentario->establecimiento;
                                    $editUrl = route('admin.establecimientos.edit', $establecimiento);
                                    $obj = $establecimiento->nombre;
                                    return  view('ui.link', compact('obj', 'editUrl'));
                                })
                                ->editColumn('user_id', function($comentario){
                                    $usuario = $comentario->establecimiento->usuario;
                                    $editUrl = route('admin.users.edit', $usuario);
                                    $obj = $usuario->name;
                                    return  view('ui.link', compact('obj', 'editUrl'));
                                })
                                ->addColumn('actions', function($comentario){
                                    $editUrl = route('admin.comentarios.edit', $comentario);
                                    $deleteUrl = route('admin.comentarios.destroy', $comentario);
                                    $id = $comentario->id;

                                    return view('ui.actionButtons', compact('editUrl', 'deleteUrl','id'));
                                })
                                ->make(true);
    }
}
