@props([
    'photoFileHeader',
    'photoCount',
    'carInfo'
])

<x-img-nav-button imgCount="{{ $photoCount }}" position="left" imgHeader="{{ $photoFileHeader }}"></x-img-nav-button>
    <img id="carPhoto" class="h-2/3 w-3/4" src="../storage/cars/{{ $photoFileHeader . '0' . '.jpg'}}" alt="{{ $carInfo }}">
<x-img-nav-button imgCount="{{ $photoCount }}" position="right" imgHeader="{{ $photoFileHeader }}"></x-img-nav-button>

<script>
    let index = 0;

    function previousButton (photoHeader){
        let image = document.getElementById('carPhoto');
        if (index > 0){
            image.src = `../storage/cars/${photoHeader}${index - 1}.jpg`;
            index--;
        }
    }
    function nextButton (photoHeader, imgCount){
        let image = document.getElementById('carPhoto');
        if (index !== (imgCount - 1)){
            image.src = `../storage/cars/${photoHeader}${index + 1}.jpg`;
            index++;
        }
    }
</script>
