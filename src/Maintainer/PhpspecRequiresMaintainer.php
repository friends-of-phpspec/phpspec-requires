<?php

declare(strict_types = 1);

namespace drupol\PhpspecRequires\Maintainer;

use drupol\phposinfo\OsInfo;
use PhpSpec\Loader\Node\ExampleNode;
use PhpSpec\Runner\Maintainer\Maintainer;
use PhpSpec\Specification;
use PhpSpec\Runner\MatcherManager;
use PhpSpec\Runner\CollaboratorManager;
use PhpSpec\Exception\Example\SkippingException;

/**
 * Class PhpspecRequiresMaintainer.
 */
class PhpspecRequiresMaintainer implements Maintainer
{
    /**
     * {@inheritdoc}
     */
    public function teardown(
        ExampleNode $example,
        Specification $context,
        MatcherManager $matchers,
        CollaboratorManager $collaborators
    ): void {
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority(): int
    {
        return 0;
    }

    /**
     * {@inheritdoc}
     */
    public function prepare(
        ExampleNode $example,
        Specification $context,
        MatcherManager $matchers,
        CollaboratorManager $collaborators
    ): void {
        $annotations = $this->getAnnotation(
            '@requires',
            $example->getFunctionReflection()->getDocComment()
        );

        if (false === $annotations) {
            return;
        }

        foreach ($annotations as $annotation) {
            $type = \substr($annotation, 0, \strpos($annotation, ' '));
            $value = \substr($annotation, \strpos($annotation, ' ') + 1);

            switch ($type) {
                case 'OS':
                    if (!OsInfo::isOs($value)) {
                        throw new SkippingException(
                            \sprintf('This spec requires OS "%s".', $value)
                        );
                    }

                    break;

                case 'OSFAMILY':
                    if (!OsInfo::isFamily($value)) {
                        throw new SkippingException(
                            \sprintf('This spec requires OS family "%s".', $value)
                        );
                    }

                    break;

                case 'function':
                    if (!\function_exists($value)) {
                        throw new SkippingException(
                            \sprintf('This spec requires the function "%s".', $value)
                        );
                    }

                    break;

                case 'extension':
                    if (!\extension_loaded($value)) {
                        throw new SkippingException(
                            \sprintf('This spec requires the PHP extension "%s".', $value)
                        );
                    }

                    break;

                case 'PHP':
                    $version = \explode('.', $value);
                    $versionId = $version[0] * 10000 + $version[1] * 100 + $version[2];

                    if (\PHP_VERSION_ID < $versionId) {
                        throw new SkippingException(
                            \sprintf('This spec requires the PHP version "%s" or greater.', $value)
                        );
                    }

                    break;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function supports(ExampleNode $example): bool
    {
        return true;
    }

    /**
     * Get the annotation.
     *
     * @param string $docComment
     * @param mixed $annotation
     *
     * @return array
     */
    protected function getAnnotation($annotation, $docComment): array
    {
        return
        \array_map(
            static function ($tag) use ($annotation) {
                $regex = \sprintf('#%s ([^ ].*)#', $annotation);

                \preg_match($regex, $tag, $match);

                return $match[1];
            },
            \array_filter(
                \array_map(
                    'trim',
                    \explode(
                        "\n",
                        \str_replace(
                            "\r\n",
                            "\n",
                            $docComment
                        )
                    )
                ),
                static function ($docline) use ($annotation) {
                    return false !== \strpos($docline, $annotation);
                }
            )
        );
    }
}
