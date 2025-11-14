## Design Pattern - Padrões comportamentais

### Projeto
***Sobre o projeto***
Esse é um projeto que aplica conceitos estudados sobre o Design Pattern - padrões comportamentais. O projeto é um exemplo de uma loja que precisa calcular o imposto dos orçamentos, existem dois tipos de impostos, o ICMS com 12% e ISS com 6%

**Tabela de Impostos**

| Imposto | Valor (%) |
|----------|-----------|
| ICMS     | 12%       |
| ISS      | 6%        |

**Tabela de regras de descontos**

As regras tem prioridades para não ser possível usar descontos progressivos, por exemplo o maior desconto é o de acima de 500, se o orçamento for de um valor que encaixe nessa regra o desconto será de 10%, mesmo se a quantidade for 10, para não ocorrer de aplicar 15% que é a soma dos dois descontos, portante somente uma regra será aplicada e tem prioridade.

| Regra                       | Valor (%) |
|-----------------------------|-----------|
| Valor maior que **500**     | **10%**   |
| Quantidade maior que **5**  | **5%**    |

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

#### Chains of Responsability

***O que ele faz?***
Ao invés de ficarmos usando vários ifs que possuem uma ordem de execução, podemos criar classes que controlam essas ordens de responsabilidades, onde elas serão responsáveis por executar uma ação com base em uma condição e se, essa condição não for aceita ela passa a responsabilidade para uma próxima classe

Exemplo que pode crescer
```php
if ($valor > 500) {
    return $valor * 0.1;
} elseif ($quantidade > 5) {
    return $valor * 0.05;
} else {
    return 0;
}
```

Como utilizar o Chain of Responsability

1. Classe abstrata
```php
abstract class Discount {
    protected ?Discount $nextDiscount;

    public function __construct(?Discount $discount)
    {
        $this->nextDiscount = $discount;
    }

    abstract public function calculate(Budget $budget): float;
}
```

2. Regra 1: Valor maior que 500
```php
class DiscountForAmountsOver500 extends Discount {
    public function calculate(Budget $budget): float {
        if ($budget->value > 500) {
            return $budget->value * 0.1;
        }

        return $this->nextDiscount->calculate($budget);
    }
}
```

3. Regra 2: Quantidade maior que 5
```php
class DiscountForQuantityGreater5 extends Discount {
    public function calculate(Budget $budget): float {
        if ($budget->quantity > 5) {
            return $budget->value * 0.05;
        }

        return $this->nextDiscount->calculate($budget);
    }
}
```

4. Regra 3: Nenhum desconto
```php
class DiscountNotApplied extends Discount {
    public function __construct() {
        parent::__construct(null);
    }

    public function calculate(Budget $budget): float {
        return 0;
    }
}
```

5. Aplicando a responsabilidade
```php
class DiscountCalculator {
    public function calculate(Budget $budget): float {

        $discountChain = new DiscountForAmountsOver500(
            new DiscountForQuantityGreater5(
                new DiscountNotApplied()
            )
        );

        return $discountChain->calculate($budget);
    }
}
```