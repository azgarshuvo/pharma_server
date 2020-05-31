<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($customerorderlin->quantity) ? $customerorderlin->quantity : ''}}" required>
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($customerorderlin->price) ? $customerorderlin->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="control-label">{{ 'Discount' }}</label>
    <input class="form-control" name="discount" type="number" id="discount" value="{{ isset($customerorderlin->discount) ? $customerorderlin->discount : ''}}" >
    {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('subtotal') ? 'has-error' : ''}}">
    <label for="subtotal" class="control-label">{{ 'Subtotal' }}</label>
    <input class="form-control" name="subtotal" type="number" id="subtotal" value="{{ isset($customerorderlin->subtotal) ? $customerorderlin->subtotal : ''}}" >
    {!! $errors->first('subtotal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('customer_order_id') ? 'has-error' : ''}}">
    <label for="customer_order_id" class="control-label">{{ 'Customer Order Id' }}</label>
    <input class="form-control" name="customer_order_id" type="number" id="customer_order_id" value="{{ isset($customerorderlin->customer_order_id) ? $customerorderlin->customer_order_id : ''}}" >
    {!! $errors->first('customer_order_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('medicine_id') ? 'has-error' : ''}}">
    <label for="medicine_id" class="control-label">{{ 'Medicine Id' }}</label>
    <input class="form-control" name="medicine_id" type="number" id="medicine_id" value="{{ isset($customerorderlin->medicine_id) ? $customerorderlin->medicine_id : ''}}" >
    {!! $errors->first('medicine_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('medicine_unit_type_id') ? 'has-error' : ''}}">
    <label for="medicine_unit_type_id" class="control-label">{{ 'Medicine Unit Type Id' }}</label>
    <input class="form-control" name="medicine_unit_type_id" type="number" id="medicine_unit_type_id" value="{{ isset($customerorderlin->medicine_unit_type_id) ? $customerorderlin->medicine_unit_type_id : ''}}" >
    {!! $errors->first('medicine_unit_type_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
