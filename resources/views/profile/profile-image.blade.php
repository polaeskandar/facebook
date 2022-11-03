@if ($showImage)
  <img src="{{ $currentProfileImage->image }}" alt="user-{{ $user->id }}-image" class="user-current-profile" />
@else
  <div class="user-first-letter d-flex align-items-center justify-content-center py-4" style="">{{ strtoupper($user->name[0]) }}</div>
@endif
