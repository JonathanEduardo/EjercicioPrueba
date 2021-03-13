<div>

    <div class="container mx-auto px-4 mt-10" >
        <div class="" >
            <div class="flex flex-wrap md:flex-row w-3/5 m-auto ">
                <div class="flex  w-full text-center  ">
                    <p class="w-full mx-1 my-3 text-base font-xl text-blue-900 font-bold ">CREAR NUEVA ORDEN DE COMPRA</p>
                    
                </div>
                <div class="flex flex-col w-1/2">
                 
                    <input wire:model='folio' placeholder="Folio" type="text" class="ml-3 my-1 border-b-2 border-gray-300 focus focus:border-gray-600 focus:outline-none text-base">
                </div>
                <div class="flex flex-col w-1/2">
                    
                    <input wire:model='date' type="date" class="ml-3 my-1 border-b-2 border-gray-300 focus focus:border-gray-600 focus:outline-none text-base">
                </div>
                <div class="flex flex-col w-1/2">
              
                    <select wire:model='idVendor' placeholder="Proveedor" class="border bg-white rounded outline-none ml-3 my-1 border-b-2 border-gray-300 focus focus:border-gray-600 focus:outline-none text-base ">
                        <option value="0">Selecciona un Proveedor</option>
                        @foreach ($vendor as $v)
                       <option value="{{$v->idVendor}}">{{$v->name}}</option>
                       @endforeach
            
                    </select>


                  
                </div>
                <div class="flex flex-col w-1/2">
                  
                    <input wire:model='comment' placeholder="Comentarios" type="text" class="ml-3 my-1 border-b-2 border-gray-300 focus focus:border-gray-600 focus:outline-none text-base">
                </div>
                <div class="flex flex-col w-full">
                    <label class="mx-3 text-base font-bold text-blue-900 mt-2" for="">PRODUCTOS</label>
                    <select  wire:model='idProduct' class="border bg-white rounded outline-none ml-3 my-1 border-b-2 border-gray-300 focus focus:border-gray-600 focus:outline-none text-base ">
                        <option value="0">Selecciona un Productor</option>
                        @foreach ($product as $p)
                        <option value="{{$p->idProduct}}">{{$p->description}}</option>
                        @endforeach
                    </select>


                </div>

                <div class="flex  w-full text-right">
                   
                    @if ($accion == "crear")
                    <p wire:click="create" class="w-full mx-1 my-3 text-base font-xl text-blue-900 font-bold hover:underline cursor-pointer ">AGREGAR</p>

                    @else
                    <p wire:click="cancelar" class="w-3/4 mx-1 my-3 text-base font-xl text-blue-900 font-bold hover:underline cursor-pointer ">CANCELAR</p>

                    <p wire:click="update" class="w-3/4 mx-1 my-3 text-base font-xl text-blue-900 font-bold hover:underline cursor-pointer ">ACTUALIZA</p>

                    @endif

            
                
                </div>
              
            </div>
        </div>
       
        <div class="overflow-x-auto mt-10">
            <div class="min-w-screen min-h-screen  flex  justify-center  font-sans overflow-hidden">
                <div class="w-full lg:w-5/6">
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">FOLIO</th>
                                    <th class="py-3 px-6 text-left">PROVEEDOR</th>
                                    <th class="py-3 px-6 text-left">FECHA</th>
                                    <th class="py-3 px-6 text-center">TOTAL</th>
                                    <th class="py-3 px-6 text-center">ESTATUS</th>
                                    <th class="py-3 px-6 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @php
                             
                                $pos = 0;
                            @endphp
                                @foreach ($order as $o)
                                
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="font-medium">{{$o->foli}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center">
                                                <span>{{$o->name}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center">
                                                <span>{{$o->date}}</span>
                                            </div>
                                        </td>
                                    
                                        <td class="py-3 px-6 text-center">
                                            {{$o->price}}
                                        </td>

                                        <td class="py-3 px-6 text-center">
                                            <span wire:click="cambiaEstado({{$order}},{{$pos}})"   class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs cursor-pointer"> {{$o->status}}</span>
                                        </td>

                                        <td class="py-3 px-6 text-center">
                                            <a wire:click="edit({{$order}},{{$pos}})"   title="Editar" class="text-blue-700 cursor-pointer" >
                                                <i class="fa fa-edit"></i>
                                            </a> &nbsp;
                                            <a wire:click="delete({{$order}},{{$pos}})"   title="Editar" class="text-red-500 cursor-pointer" >
                                                <i class="fas fa-trash-alt"></i>
                                            </a> &nbsp;
                                           
                                           
                                           
                                         </td>
                                    </tr>
                                     @php
                                $pos ++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
