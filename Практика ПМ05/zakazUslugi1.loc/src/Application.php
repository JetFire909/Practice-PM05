<?php

namespace src;

use src\exceptions\InvalidArgumentException;

class Application extends Entity
{
    protected int $user_id;
    protected string $reason;
    protected string $text;
    protected string $date;
    protected string $time;
    protected string $created_at;
    protected string $status;
    public string $tableName = 'application'; 

    public function getAppId(): string{
        return $this->id;
    }
    public function getAppDate(): string{
        return $this->date;
    }
    public function getAppTime(): string{
        return $this->time;
    }

    public function validate(): void{
        date_default_timezone_set('Europe/Moscow');
        if(empty($this->reason)){
            throw new InvalidArgumentException('Не указана причина обращения');
        }
        if(empty($this->text)){
            throw new InvalidArgumentException('Не указано описание');
        }
        if(empty($this->date)){
            throw new InvalidArgumentException('Не указана дата');
        }
        if(empty($this->time)){
            throw new InvalidArgumentException('Не указано время');
        }
        if(!preg_match('/^\d{4}-\d{2}-\d{2}$/', $this->date)){
            throw new InvalidArgumentException('Неверный формат даты');
        }
        if(!preg_match('/^\d{2}:\d{2}$/', $this->time)){
            throw new InvalidArgumentException('Неверный формат времени');
        }
        $currentDate = date('Y-m-d');
        if($this->date < $currentDate){
            throw new InvalidArgumentException('Нельзя выбрать прошедшую дату');
        }
        if($this->date === $currentDate){
            $currentTime = date('H:i');
            if($this->time < $currentTime){
                throw new InvalidArgumentException('Нельзя выбрать прошедшее время сегодня');
            }
        }
    }
    public function saveApplication(int $user_id): bool{
        $fields = [
            'user_id' => $user_id,
            'reason' => $this->reason,
            'text' => $this->text,
            'date' => $this->date,
            'time' => $this->time,
            'status' => 'new'
        ];
        return $this->insert($fields);
    }
}
// исправить ER диаграмму