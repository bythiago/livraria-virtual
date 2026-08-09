<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Dom Casmurro',
                'author' => 'Machado de Assis',
                'isbn' => '9788572327899',
                'published_at' => '1899-01-01',
                'description' => 'Um dos maiores romances da literatura brasileira, narra a história de Bentinho, que suspeita da traição da esposa Capitú.',
            ],
            [
                'title' => 'O Alquimista',
                'author' => 'Paulo Coelho',
                'isbn' => '9788572325907',
                'published_at' => '1988-01-01',
                'description' => 'A jornada de Santiago, um jovem pastor que viaja do Egito até o deserto do Saara em busca de um tesouro.',
            ],
            [
                'title' => 'Memórias Póstumas de Brás Cubas',
                'author' => 'Machado de Assis',
                'isbn' => '9788572327734',
                'published_at' => '1881-01-01',
                'description' => 'Brás Cubas conta sua própria história após a morte, em uma obra que mistura ironia e profundidade.',
            ],
            [
                'title' => 'Capitães da Areia',
                'author' => 'Jorge Amado',
                'isbn' => '9788572325044',
                'published_at' => '1937-01-01',
                'description' => 'A vida dos meninos de rua em Salvador, liderados pelo Pedro Bala, em um dos romances mais célebres de Amado.',
            ],
            [
                'title' => 'A Hora da Estrela',
                'author' => 'Clarice Lispector',
                'isbn' => '9788572328274',
                'published_at' => '1977-01-01',
                'description' => 'A história de Macabéa, uma jovem nordestina que mora no Rio de Janeiro e enfrenta a pobreza e a solidão.',
            ],
            [
                'title' => 'O Cortiço',
                'author' => 'Aluísio Azevedo',
                'isbn' => '9788572327213',
                'published_at' => '1890-01-01',
                'description' => 'Retrato da vida no Rio de Janeiro do século XIX, com seus personagens marginais e a paisagem urbana.',
            ],
            [
                'title' => 'Vidas Secas',
                'author' => 'Graciliano Ramos',
                'isbn' => '9788572325617',
                'published_at' => '1938-01-01',
                'description' => 'A luta pela sobrevivência de uma família sertaneja no interior do Nordeste brasileiro.',
            ],
            [
                'title' => 'Grande Sertão: Veredas',
                'author' => 'Guimarães Rosa',
                'isbn' => '9788572325754',
                'published_at' => '1956-01-01',
                'description' => 'A epopeia de Riobaldo, jagunço que percorre o sertão mineiro em busca de respostas sobre a vida.',
            ],
            [
                'title' => 'Quarto de Despejo',
                'author' => 'Carolina Maria de Jesus',
                'isbn' => '9788572326835',
                'published_at' => '1960-01-01',
                'description' => 'Diário de uma moradora da favela do Canindé, em São Paulo, retratando a miséria e a esperança.',
            ],
            [
                'title' => 'Iracema',
                'author' => 'José de Alencar',
                'isbn' => '9788572327039',
                'published_at' => '1865-01-01',
                'description' => 'O romance indígena que narra a história de amor entre Iracema e Martim, o colonizador português.',
            ],
            [
                'title' => 'O Guarani',
                'author' => 'José de Alencar',
                'isbn' => '9788572327046',
                'published_at' => '1857-01-01',
                'description' => 'Aventura amorosa entre Peri, guerreiro indígena, e Cecília, filha de nobres portugueses.',
            ],
            [
                'title' => 'Senhora',
                'author' => 'José de Alencar',
                'isbn' => '9788572327053',
                'published_at' => '1875-01-01',
                'description' => 'A história de Adelaide, que compra um marido por vingança e acaba se apaixonando.',
            ],
            [
                'title' => 'A Moreninha',
                'author' => 'Joaquim Manuel de Macedo',
                'isbn' => '9788572327060',
                'published_at' => '1844-01-01',
                'description' => 'Um dos primeiros romances românticos brasileiros, sobre o amor e as intrigas na corte do Rio de Janeiro.',
            ],
            [
                'title' => 'O Missionário',
                'author' => 'José de Alencar',
                'isbn' => '9788572327077',
                'published_at' => '1862-01-01',
                'description' => 'A saga de um missionário que enfrenta os desafios da conversão dos índios no sertão.',
            ],
            [
                'title' => 'O Sertanejo',
                'author' => 'José de Alencar',
                'isbn' => '9788572327084',
                'published_at' => '1875-01-01',
                'description' => 'A vida no sertão nordestino e os conflitos entre tradição e modernidade.',
            ],
            [
                'title' => 'A Pata da Gazela',
                'author' => 'José de Alencar',
                'isbn' => '9788572327091',
                'published_at' => '1860-01-01',
                'description' => 'Uma história de amor e mistério envolvendo uma jovem e um misterioso estrangeiro.',
            ],
            [
                'title' => 'O Gaúcho',
                'author' => 'José de Alencar',
                'isbn' => '9788572327107',
                'published_at' => '1872-01-01',
                'description' => 'As aventuras de um gaúcho no sul do Brasil, misturando romance e aventura.',
            ],
            [
                'title' => 'Lolita',
                'author' => 'Vladimir Nabokov',
                'isbn' => '9780679723165',
                'published_at' => '1955-01-01',
                'description' => 'A polêmica história de Humbert Humbert e sua obsessão pela jovem Lolita.',
            ],
            [
                'title' => 'O Pequeno Príncipe',
                'author' => 'Antoine de Saint-Exupéry',
                'isbn' => '9788572325495',
                'published_at' => '1943-01-01',
                'description' => 'A jornada de um pequeno príncipe por vários planetas, encontrando lições sobre a vida.',
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'isbn' => '9780451524935',
                'published_at' => '1949-01-01',
                'description' => 'Um futuro distópico onde o governo controla todos os aspectos da vida humana.',
            ],
            [
                'title' => 'O Conto da Aia',
                'author' => 'Margaret Atwood',
                'isbn' => '9780385490818',
                'published_at' => '1985-01-01',
                'description' => 'Em uma teocracia fundamentalista, mulheres são reduzidas a sua função reprodutiva.',
            ],
            [
                'title' => 'Cem Anos de Solidão',
                'author' => 'Gabriel García Márquez',
                'isbn' => '9780060883287',
                'published_at' => '1967-01-01',
                'description' => 'A história da família Buendía ao longo de sete gerações na cidade fictícia de Macondo.',
            ],
            [
                'title' => 'A Revolução dos Bichos',
                'author' => 'George Orwell',
                'isbn' => '9780451526342',
                'published_at' => '1945-01-01',
                'description' => 'Uma fábula política sobre a revolução de animais em uma fazenda e a corrupção do poder.',
            ],
            [
                'title' => 'O Hobbit',
                'author' => 'J.R.R. Tolkien',
                'isbn' => '9780547928227',
                'published_at' => '1937-01-01',
                'description' => 'Bilbo Bolseiro parte em uma jornada inesperada para recuperar um tesouro guardado por um dragão.',
            ],
            [
                'title' => 'Harry e a Pedra Filosofal',
                'author' => 'J.K. Rowling',
                'isbn' => '9788532530912',
                'published_at' => '1997-01-01',
                'description' => 'O primeiro livro da série que acompanha as aventuras do bruxo Harry Potter em Hogwarts.',
            ],
            [
                'title' => 'O Poder do Hábito',
                'author' => 'Charles Duhigg',
                'isbn' => '9788543102917',
                'published_at' => '2012-01-01',
                'description' => 'Como os hábitos funcionam e como podemos mudá-los para transformar nossas vidas.',
            ],
            [
                'title' => 'Mindset: A Nova Psicologia do Sucesso',
                'author' => 'Carol S. Dweck',
                'isbn' => '9788576842781',
                'published_at' => '2006-01-01',
                'description' => 'A importância da mentalidade de crescimento para alcançar o sucesso pessoal e profissional.',
            ],
            [
                'title' => 'A Arte da Guerra',
                'author' => 'Sun Tzu',
                'isbn' => '9788572326126',
                'published_at' => '1900-01-01',
                'description' => 'O tratado militar mais antigo do mundo, com ensinamentos sobre estratégia e liderança.',
            ],
            [
                'title' => 'O Monge e o Executivo',
                'author' => 'James C. Hunter',
                'isbn' => '9788573162578',
                'published_at' => '2002-01-01',
                'description' => 'Uma história sobre liderança e gestão de pessoas, inspirada nos ensinamentos de São Francisco.',
            ],
            [
                'title' => 'Quem Pensa Enriquece',
                'author' => 'Napoleon Hill',
                'isbn' => '9788572325419',
                'published_at' => '1937-01-01',
                'description' => 'O clássico sobre a importância da atitude mental para alcançar a prosperidade financeira.',
            ],
            [
                'title' => 'O Diário de Anne Frank',
                'author' => 'Anne Frank',
                'isbn' => '9788572326027',
                'published_at' => '1947-01-01',
                'description' => 'O diário pessoal de Anne Frank durante os dois anos em que ficou escondida dos nazistas.',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
