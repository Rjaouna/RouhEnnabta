<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251211104012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bienfaits (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE bienfaits_product (bienfaits_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_7E27F9FECF2CECE7 (bienfaits_id), INDEX IDX_7E27F9FE4584665A (product_id), PRIMARY KEY (bienfaits_id, product_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE precaution (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE precaution_product (precaution_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_C211F636A74D7C53 (precaution_id), INDEX IDX_C211F6364584665A (product_id), PRIMARY KEY (precaution_id, product_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE recettes (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE recettes_product (recettes_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_73D3749F3E2ED6D6 (recettes_id), INDEX IDX_73D3749F4584665A (product_id), PRIMARY KEY (recettes_id, product_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE bienfaits_product ADD CONSTRAINT FK_7E27F9FECF2CECE7 FOREIGN KEY (bienfaits_id) REFERENCES bienfaits (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bienfaits_product ADD CONSTRAINT FK_7E27F9FE4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE precaution_product ADD CONSTRAINT FK_C211F636A74D7C53 FOREIGN KEY (precaution_id) REFERENCES precaution (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE precaution_product ADD CONSTRAINT FK_C211F6364584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recettes_product ADD CONSTRAINT FK_73D3749F3E2ED6D6 FOREIGN KEY (recettes_id) REFERENCES recettes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recettes_product ADD CONSTRAINT FK_73D3749F4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADD2FD85F1 FOREIGN KEY (gamme_id) REFERENCES gammes (id)');
        $this->addSql('ALTER TABLE product_image ADD CONSTRAINT FK_64617F034584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bienfaits_product DROP FOREIGN KEY FK_7E27F9FECF2CECE7');
        $this->addSql('ALTER TABLE bienfaits_product DROP FOREIGN KEY FK_7E27F9FE4584665A');
        $this->addSql('ALTER TABLE precaution_product DROP FOREIGN KEY FK_C211F636A74D7C53');
        $this->addSql('ALTER TABLE precaution_product DROP FOREIGN KEY FK_C211F6364584665A');
        $this->addSql('ALTER TABLE recettes_product DROP FOREIGN KEY FK_73D3749F3E2ED6D6');
        $this->addSql('ALTER TABLE recettes_product DROP FOREIGN KEY FK_73D3749F4584665A');
        $this->addSql('DROP TABLE bienfaits');
        $this->addSql('DROP TABLE bienfaits_product');
        $this->addSql('DROP TABLE precaution');
        $this->addSql('DROP TABLE precaution_product');
        $this->addSql('DROP TABLE recettes');
        $this->addSql('DROP TABLE recettes_product');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADD2FD85F1');
        $this->addSql('ALTER TABLE product_image DROP FOREIGN KEY FK_64617F034584665A');
    }
}
