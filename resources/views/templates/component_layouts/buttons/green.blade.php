<?php
    if ( !isset($message) ) {
        throw new Error("Property `message` is required.");
    }
?>

<button type="submit"
            class="select-none mt-6 font-bold rounded-md py-3 bg-green-600 text-white
                hover:bg-green-700
                dark:bg-green-700
                dark:hover:bg-green-800"
    >
    {{ $message }}
</button>
