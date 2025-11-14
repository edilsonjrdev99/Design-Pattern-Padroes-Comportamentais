## Design Pattern - Padrões comportamentais

### Projeto
***Sobre o projeto***
Esse é um projeto que aplica conceitos estudados sobre o Design Pattern - padrões comportamentais. O projeto é um exemplo de uma loja que precisa calcular o imposto dos orçamentos, existem dois tipos de impostos, o ICMS com 12% e ISS com 6%

**Tabela de Impostos**

| Imposto | Valor (%) |
|----------|-----------|
| ICMS     | 12%       |
| ISS      | 6%        |

### Conceitos

#### Strategy

***O que ele faz***
Sua função é substituir o uso de vários ifs ou um switch que pode crescer e escalar muito. Ao invés de usarmos essa prática de ifs ou switch que podem crescer usamos classes responsáveis por executar o que cada caso seria responsável por fazer.

Exemplo que pode escalar
```php
    // Poderia ter vários tipos de imposto
    switch($type) {
        case 'icms':
            return 0.12;
        case 'iss':
            return 0.06;
        default:
            return 0;
    }
```

Utilizar o Strategy
```php
    // Interface do exemplo espera um método calculate
    class taxICMS implements TaxInterface {
        public function calculate(Budget $budget): float {
            return $budget->value * 0.12;
        }
    }
```