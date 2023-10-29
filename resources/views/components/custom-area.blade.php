@props(['myvalue' => ''])
<textarea  cols="30" rows="10" {!! $attributes->merge([ 'class' =>'bg-gray-200 px-4 py-2 mb-2 w-full' ]) !!}>{{ $myvalue }}</textarea>