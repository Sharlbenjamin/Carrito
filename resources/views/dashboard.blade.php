<x-app-layout>
   <x-slot name="header">
        Dashboard
   </x-slot>
   <div>
      <div>
      <h1>Welcome Mr/Mrs <span class="font-bold text-2xl text-blue-800">{{Auth::user()->name}}...</span></h1>
   </div>
   <div>
      <h2>Looks Like you don't have any <span class="font-bold text-2xl text-blue-800"><a href="{{route('cars.index')}}">Cars</a></span> added yet.</h2>
   </div>
   <div class="mt-4">
      <h3>Please <a class="text-blue-600 font-bold" href="{{route('cars.create')}}">Add your first Car</a> To get Started</h3>
   </div>
   <div class="mt-4">
      <h4>We can feed you back regarding the maintenane centers and the correct date to fix your part</h4>
   </div>
</div>
</x-app-layout>
