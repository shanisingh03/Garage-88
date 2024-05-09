<div>Number: {{ $record->id }}</div>
<div>Name: {{ $record->name }}</div>
<div>Description: {{ $record->description }}</div>
<div>Interval: {{ $record->interval }}</div>
<div>Time Taken: {{ $record->time_taken }}</div>
<div>Warranty: {{ $record->warranty }}</div>
<div>Match: {{ $record->match }}</div>
<div>Note: {{ $record->note }}</div>
<div>Status: {{ $record->status == 1 ? 'Active' : 'Inactive' }}</div>
<div>Inclusions:</div>
<ul>
    @foreach($record->inclusion as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>
