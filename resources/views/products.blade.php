<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
  
    <link href="/styles.css" rel="stylesheet">
</head>
<body>
        <div class="product-container">
            @foreach ($filteredProducts as $product)
            <div class="product-card">
                <img class="product-image" src="path_to_product_image.jpg" alt="Product Image">
                <div class="product-details">
                    <p>ID:{{$product->getId()}}</p>
                    <h2 class="product-title">{{ $product->getName() }}</h2>
                    <p class="product-description">Цена: {{ $product->getPrice() }} рублей</p>   
                    {{-- примечательно,что выводить данные будет всегда без активного чекбокса в виду специфики метода getSellableProducts() классса ProductService --}}
                    <label for="stockStatus">Статус акции:</label>
                    <input type="checkbox" id="promotionType" name="promotionType" {{ $product->getPromotionType() ? 'checked' : '' }} disabled><br><br>
                    <label for="stockStatus">Статус остатков:</label>
                    <input type="checkbox" id="stockStatus" name="stockStatus" {{ $product->getStockStatus() ? 'checked' : '' }} disabled><br><br>

                    <button class="buy-button">Купить</button>
                </div>
            </div>
            @endforeach
        </div>
       
        
        <div class="form-container">
            <h1>Изменить цену товара</h1>
            <form class="form" action="{{route('products.update')}}" method="post">
                @csrf
                <label for="product_id">ID товара:</label>
                <input type="text" id="product_id" name="product_id" required><br><br>

                <label for="new_price">Новая цена:</label>
                <input type="number" id="new_price" name="new_price" required><br><br>

                <input type="submit" value="Изменить цену">
            </form>
        </div>


        <div class="form-container">
            <h1>Добавить новый товар</h1>
            <form class="form" action="{{ route('products.add') }}" method="post">
                @csrf
                <label for="id">ID товара:</label>
                <input type="text" id="id" name="id" required><br><br>
            

                <label for="id">ID Шильдика:</label>
                <input type="text" id="id" name="badge_id" required><br><br>



                <label for="name">Название товара:</label>
                <input type="text" id="name" name="name" required><br><br>
            
                <label for="price">Цена товара:</label>
                <input type="number" id="price" name="price" required><br><br>
            
                <label for="stock">Остаток товара:</label>
                <input type="number" id="stock" name="stock" required><br><br>
            
                <label for="promotionType">Тип акции (Акция, Уценка, пусто):</label>
                <input type="text" id="promotionType" name="promotionType"><br><br>
            
                <label for="stockStatus">Статус остатков (Запрет продаж, снят с производства, пусто):</label>
                <input type="text" id="stockStatus" name="stockStatus"><br><br>
            
                <input type="submit" value="Добавить товар">
            </form>
        </div>


        <div class="form-container">
            <h1>Добавить новый Шильд</h1>
            <form class="form" action="{{ route('badges.add') }}" method="post">
                @csrf
        
                <label for="id">ID Шильдика:</label>
                <input type="text" id="id" name="id_badge" required><br><br>
        
                <label for="name">Название:</label>
                <input type="text" id="name" name="name_badge" required><br><br>
        
                <label for="color">Цвет:</label>
                <input type="text" id="color" name="color" required><br><br>
        
                <label for="semantic">Семантика:</label>
                <input type="text" id="semantic" name="semantic" required><br><br>
        
                <label for="sortingOrder">Порядок сортировки:</label>
                <input type="text" id="sortingOrder" name="sorting_order" required><br><br>
        
                <input type="submit" value="Добавить шильд">
            </form>
        </div>
      
        
        <div class="form-container">   
            @dump( session('badge'))
            @dump( session('products'))
        </div>
</body>
</html>

