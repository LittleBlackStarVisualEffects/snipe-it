@props([
    'infoObject',
])

@if (($infoObject) && ($infoObject->statuslabel))

    @if (($infoObject->assignedTo) && ($infoObject->deleted_at==''))
        <x-icon type="circle-solid" class="text-blue"/>
        {{ $infoObject->statuslabel->name }}
        <label class="label label-default">{{ trans('general.deployed') }}</label>
        <x-icon type="long-arrow-right"/>
        <x-icon type="{{ $infoObject->assignedType() }}" class="fa-fw"/>
        {!!  $infoObject->assignedTo->present()->nameUrl() !!}
    @else
        @if (($infoObject->statuslabel) && ($infoObject->statuslabel->deployable=='1'))
            <x-icon type="circle-solid" class="text-green"/>
        @elseif (($infoObject->statuslabel) && ($infoObject->statuslabel->pending=='1'))
            <x-icon type="circle-solid" class="text-orange"/>
        @else
            <x-icon type="x" class="text-red"/>
        @endif
        <a href="{{ route('statuslabels.show', $infoObject->statuslabel->id) }}">
            {{ $infoObject->statuslabel->name }}</a>
        <label class="label label-default">{{ $infoObject->present()->statusMeta }}</label>

    @endif
@endif
