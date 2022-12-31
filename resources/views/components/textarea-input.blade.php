@props(['disabled' => false])

<textarea id="name" name="introduction" cols="50" rows="10" type="text" class="introduction_text" :value="" required autofocus autocomplete="introduction" >old('introduction', $user->introduction) </textarea>