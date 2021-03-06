
    const search = document.getElementById('search');
    const tableBody = document.getElementById('tbody');
    function getContent() {
        const searchValue = search.value;
        const xhr = new XMLHttpRequest();
        // xhr.open('GET', '{{ route ('search')}}/?search=' + searchValue, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                tableBody.innerHTML = xhr.responseText;
            }
        }
        xhr.send()
    }
    search.addEventListener('input', getContent);
