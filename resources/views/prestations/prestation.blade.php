@extends('layouts.app')

@section('title', 'Prestations - Amarinte')

@section('footer')


@section('content')
<div class="banniere">
    <div class="banniere-image">
    </div>
    <div class="banniere-contenu">
        <h1 class="banniere-titre">Nos prestations</h1>
    </div>
</div>

<div class="prestations-container">
    @foreach($prestations as $prestation)
        <div class="prestation-card">
            <div class="product-card__image">
                @if($prestation->hero_image)
                    <img src="{{ asset('storage/' . $prestation->hero_image) }}" alt="{{ $prestation->title }}">
                @else
                    <div style="height: 250px; background-color: #e0e0e0; display: flex; align-items: center; justify-content: center; color: #757575;">
                        <span>Pas d'image</span>
                    </div>
                @endif
            </div>
            <div class="product-card__info">
                <h2 class="product-card__title">{{ $prestation->title }}</h2>
                <div class="product-card__price-row">
                    <a href="{{ route('prestations.public.show', $prestation) }}" class="product-card__btn" style="margin-left: auto;">
                        Voir plus
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<style>
    :root {
        --primary-color: #eaf1dd;
        --secondary-color: #72717c;
        --accent-color: #eaf1dd;
        --light-gray: #f5f7f9;
        --dark-gray: #72717c;
        --accent-blue: #4c8fbb;
        --card-background: #ffffff;
        --text-color: #333;
    }
    .banniere {
        width: 100%;
        position: relative;
        margin-top: 65px;
    }
    
    .banniere-image {
        width: 100%;
        height: 40vh;
        background-image: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.5)), url('./images/nos_references.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
    }
    
    .banniere-contenu {
        text-align: center;
        max-width: 800px;
        padding: 40px 20px;
        margin: 0 auto;
    }
    
    .banniere-titre {
        font-family: 'Jost', sans-serif;
        font-size: 42px;
        color: #46454c;
        letter-spacing: 4px;
        font-weight: 300;
        text-transform: uppercase;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    
    .prestations-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        padding: 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .prestation-card {
        background-color: var(--card-background);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 400px;
        flex: 1 1 300px;
    }

    .prestation-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .product-card__image {
        height: 250px;
        overflow: hidden;
    }

    .product-card__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .prestation-card:hover .product-card__image img {
        transform: scale(1.05);
    }

    .product-card__info {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .product-card__title {
        font-family: 'Jost', sans-serif;
        font-weight: 300;
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: var(--text-color);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.3;
    }

    .product-card__price-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
    }

    .product-card__btn {
        font-family: 'Jost', sans-serif;
        background-color: var(--accent-blue, #4c8fbb);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 300;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-left: auto;
    }

    .product-card__btn:hover {
        background-color: #3a7a9e;
    }

    @media (max-width: 1100px) {
        .prestation-card {
            flex: 1 1 45%;
            max-width: 45%;
        }
    }
    
    @media (max-width: 700px) {
        .prestation-card {
            flex: 1 1 100%;
            max-width: 400px;
        }
    }
    
    @media (max-width: 480px) {
        .product-card__image {
            height: 200px;
        }
        .product-card__title {
            font-size: 1.3rem;
        }
        .product-card__btn {
            padding: 8px 16px;
            font-size: 0.8rem;
        }
    }
</style>
@endsection
