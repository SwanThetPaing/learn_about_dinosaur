@props(['name','type'=>'text','value'=>'','user'])

<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <input required type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{old($name, $value)}}" class="form-control">

</x-form.input-wrapper>