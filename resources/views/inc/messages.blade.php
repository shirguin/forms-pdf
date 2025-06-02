    @if ($errors->any())
        <div class=" ml-8">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="ml-8">
            <p class="text-green-600">{{ session('success') }}</p>
        </div>
    
    @endif