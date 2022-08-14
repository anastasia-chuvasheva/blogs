<?php namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileManager
{
    private SluggerInterface $slugger;
    private ParameterBagInterface $parameterBag;

    public function __construct(SluggerInterface $slugger, ParameterBagInterface $parameterBag)
    {
        $this->slugger = $slugger;
        $this->parameterBag = $parameterBag;
    }

    public function handleFile(File $file): ?string
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

        try {
            $file->move(
                $this->parameterBag->get('image_directory'),
                $newFilename
            );
        } catch (FileException $e) {
            return null;
        }

        return $newFilename;
    }
}