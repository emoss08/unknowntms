<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://werewlf.com/ulogo.png" class="logo" alt="Unknown Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
