<?php

declare(strict_types=1);

namespace App\Quiz\Answers\Application\Create;

use App\Quiz\Answers\Domain\Answer;
use App\Quiz\Answers\Domain\AnswerId;
use App\Quiz\Answers\Domain\AnswerRepository;
use App\Quiz\Answers\Domain\AnswerText;
use App\Quiz\Questions\Domain\QuestionRepository;
use App\Quiz\Shared\Domain\Questions\QuestionId;

final class AnswerCreator
{
    public function __construct(private AnswerRepository $repository, private QuestionRepository $questionRepository)
    {
    }

    public function __invoke(CreateAnswerRequest $request): void
    {
        $id = new AnswerId($request->id());
        $questionId = new QuestionId($request->questionId());
        $text = new AnswerText($request->text());
        $correct = (bool)$request->correct();

        $question = $this->questionRepository->search($questionId);

        $answer = Answer::create(
            $id,
            $text,
            $correct,
            $question
        );

        $this->repository->save($answer);
    }
}