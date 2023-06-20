<button id="AdminBtn">Crazy Modal</button>

<div id="AdminModal" class="modal hidden fixed z-10 pt-28 top-0 left-0 w-full h-full overflow-auto bg-black bg-black/[0.4]">
    <div class="bg-dirty-white m-auto p-5 border-1 rounded w-5/6">
        <span class="close font-deep-green float-right text-xl font-bold hover:bg-black hover:cursor-pointer">&times;</span>
        <p>Fart</p>
        <x-button class="text-base mt-8 bg-deep-green text-dirty-white border-0 w-60 l-12"> 
                <div class="m-auto">                
                    {{ __('Archive Account') }}
                </div>
        </x-button>
    </div>
</div>

<script>

var modal = document.getElementById("AdminModal");

var btn = document.getElementById("AdminBtn");

var span = document.getElementsByClassName("close")[0];

// Open Modal
btn.onclick = function() {
modal.style.display = "block";
}

// Close Modal (using the X button)
span.onclick = function() {
modal.style.display = "none";
}

// Close Modal (clicking anywhere else outside the Modal)
window.onclick = function(event) {
if (event.target == modal) {
    modal.style.display = "none";
}
}
</script>