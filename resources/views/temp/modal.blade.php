<!-- Trigger/Open The Modal -->
<button id="AdminBtn">Crazy Modal</button>

<!-- The Modal -->
<div id="AdminModal" class="modal hidden fixed z-10 pt-28 top-0 left-0 w-full h-full overflow-auto bg-black bg-black/[0.4]">
    <!-- Modal content -->
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
// Get the modal
var modal = document.getElementById("AdminModal");

// Get the button that opens the modal
var btn = document.getElementById("AdminBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
    modal.style.display = "none";
}
}
</script>