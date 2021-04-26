# how to make laravel 8 components

Hello Everyone, I am going to explaint components in laravel 8. I will explian step by step how to create component in laravel and how to use it in blade files.

component is basically a some line of code which you want to reuse throught out the project. In laravel there are two type of components

1. class based components
2. anonymous components

let's start learning class components first step by step

1st step: create laravel project

first of all lets create laravel new fresh project using following commands

composer create-project laravel/laravel laracomponents --prefer-dist

or you can create new project other way also by following

composer global require laravel/installer

laravel new laracomponents

let's run project first

php artisan serve

image runlaravel.png

2nd step: create larave component

here we will create component for form inputs ex textbox, password, email etc. to create class component we should write following command into cmd

php artisan make:component Inputs

when you run this command 2 files created 1 inputs.php a class file which located into App/View/Components this file have 2 functions \_\_construct() && render(). there second one file is inputs.blade.php in resorces/views/components which is a file to rendor html.

let's create one form on home page

image bootstrapeform.png

3rd step: using components in Laravel

we can user components in blade file using following code

#syntax

<x-{ComponentName}/>
or
<x-{ComponentName}> </x-{ComponentName}>

so for example if you component name is Inputs you have to write

<x-inputs />

or if you component name is DisplayMessage then you have to write

<x-display-message />

4th step: pass variables to Components

I have write following code in my welcome.blade.php

<form>
    <x-inputs for="name" label="Name" type="text" placeholder="Fullname" />
    <x-inputs for="email" label="email" type="email" placeholder="Email Address">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </x-inputs>
    <x-inputs for="password" label="Password" type="password" placeholder="Password">
        <small id="passwordHelp" class="form-text text-muted">Password Mush Be 6 characters long</small>
    </x-inputs>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

the Input class file as followed

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Inputs extends Component
{
    public $for;
    public $type;
    public $label;
    public $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($for, $type, $label, $placeholder)
    {
        $this->for = $for;
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputs');
    }
}


and inputs component blade file 

<div class="form-group">
    <label for="{{ $for }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $for }}" placeholder="{{ $placeholder }}">
    {{$slot}}
</div>

so as you can see i need 4 diffrent variables to make this component dynamic 
1. for
2. type of input
3. placeholder of input
4. label for input

so i have passed that four valiable like as follow

<x-inputs for="name" label="Name" type="text" placeholder="Fullname" />

but what about "$slot". what is it? I have not passed any attribute with name slot so lts elobrate slot in next step

5th setp: exploain slot in simple way

so in simple term if we want to pass some additions information which we write between component tag is stored in $slot

as we take above example i have passwed some additional information in email and password will be stored in slot, if i don't pass $slot will be empty.

Now In nex step let's understand anonymous components

A component which does not have any class file and it only have blade file it is known as anonymous components.

to cretae anonymous component let's take example of checkbox component for that let's create checkboxes.blade.php in components folder

lets add one bootstap checkbox into out form to accept terms and conditions

image checkboxexample.png

for checkbox we added following code 

<div class="form-check">
    <input class="form-check-input" name="trems" type="checkbox" value="1" id="trem">
    <label class="form-check-label" for="trem">
    Accept terms and conditions
    </label>
</div>

in above example what will need to be dynamic lets list out

1. for
2. name of checkbox
3. value of checkbox
4. label of checkbox

to create that component we need to add following code to checkboxes.blade.php component file 

@props([
    'for',
    'label',
    'name',
    'value'
])

<div class="form-check">
  <input class="form-check-input" name="{{$name}}" type="checkbox" value="{{$value}}" id="{{$for}}">
  <label class="form-check-label" for="{{$for}}">
  {{$label}}
  </label>
</div>

for dynamic property we need to define @props into components file. now let's add component into our form by following code.

<x-checkboxes for="terms" name="terms" value="1" label="Accept terms and conditions" />

that's for today,

make example of diffrent type of component into your project and let me know if you have any query or need any help.

if you have any query you can ask me on any of my social media handle or you can mail me on learning@dreamseekerinfotech.com
