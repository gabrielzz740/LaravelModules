@extends('product.partials.layout-product')
@section('main-content')
<section class="content">
    <div class="row">
        <input id="listOfSales" type="hidden" value="{{ $jsonResponse->sales }}">
        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#createProductModal">
            <i class="tim-icons icon-simple-add"></i>   Nuevo producto
        </button>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th class="text-center">#</th>
                    <th>Serie</th>
                    <th>Cliente</th>
                    <th>Tipo de comprobante</th>
                    <th>Ticket</th>
                    <th>IGV</th>
                    <th>Sub total</th>
                    <th>Total</th>
                    <th>Serie</th>
                    <th>Tipo de pago</th>
                    
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 0;
                @endphp
                @foreach($jsonResponse->sales as $sale)
                @php
                    $count++;
                @endphp
                <tr class="text-center">
                    <td class="text-center">{{ $count }}</td>
                    <td>{{ $sale->serie }}</td>
                    <td>{{ $sale->data_client }}</td>
                    <td>{{ $sale->sal_type_docuent_id }}</td>
                    <td>{{ $sale->ticket }}</td>
                    <td>S/. {{ $sale->taxes }}</td>
                    <td>S/. {{ $sale->sub_total }}</td>
                    <td>S/. {{ $sale->amount }}</td>
                    <td>S/. {{ $sale->sal_series }}</td>
                    <td>S/. {{ $sale->sal_type_payment }}</td>
                    
                    <td class="td-actions text-center">
                        <button onClick="editProductModal({{ $product->id }})" type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                            <i class="tim-icons icon-pencil"></i>
                        </button>
                        <button onClick="" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                            <i class="tim-icons icon-simple-remove"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: black">Editar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label for="productName">NOMBRE</label>
                        <input class="form-control" type="text" id="editProductName" placeholder="Ingrese nombre del producto">
                        <br>
                        <label for="productName">PRECIO</label>
                        <input class="form-control" type="number" id="editProductPrice" placeholder="Ingrese el precio del producto">
                    </div>
                    <div class="col-6">
                        <label for="productName">CÓDIGO</label>
                        <input class="form-control" type="text" id="editProductCode"  placeholder="Ingrese código del producto">
                        <br>
                        <label for="productName">CATEGORÍA</label>
                        <select class="form-control" id="editProductCategory">
                            <option value="0">Producto</option>
                            <option value="1">Servicio</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" id="editProductDescription" cols="30" rows="10" placeholder="Ingrese una descripción"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" onClick="saveProduct()" data-dismiss="modal" class="btn btn-primary">Guardar</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: black">Eliminar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
            <div class="modal-body">
               ¿Estás seguro que deseas eliminar este producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection