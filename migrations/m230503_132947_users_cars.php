<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_cars}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%cars}}`
 */

class m230503_132947_users_cars extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_cars}}', [
            'users_id' => $this->integer(),
            'cars_id' => $this->integer(),
            'id' => $this->primaryKey(),

        ]);

        // creates index for column `users_id`
        $this->createIndex(
            '{{%idx-users_cars-users_id}}',
            '{{%users_cars}}',
            'users_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-users_cars-users_id}}',
            '{{%users_cars}}',
            'users_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `cars_id`
        $this->createIndex(
            '{{%idx-users_cars-cars_id}}',
            '{{%users_cars}}',
            'cars_id'
        );

        // add foreign key for table `{{%cars}}`
        $this->addForeignKey(
            '{{%fk-users_cars-cars_id}}',
            '{{%users_cars}}',
            'cars_id',
            '{{%cars}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-users_cars-users_id}}',
            '{{%users_cars}}'
        );

        // drops index for column `users_id`
        $this->dropIndex(
            '{{%idx-users_cars-users_id}}',
            '{{%users_cars}}'
        );

        // drops foreign key for table `{{%cars}}`
        $this->dropForeignKey(
            '{{%fk-users_cars-cars_id}}',
            '{{%users_cars}}'
        );

        // drops index for column `cars_id`
        $this->dropIndex(
            '{{%idx-users_cars-cars_id}}',
            '{{%users_cars}}'
        );

        $this->dropTable('{{%users_cars}}');
    }
}
